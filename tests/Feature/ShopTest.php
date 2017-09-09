<?php

namespace Tests\Feature;

use App\Billing\Payment;
use App\CharacterTemplate;
use App\Player;
use App\Product;
use App\Purchase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * This test covers the in game shop interactions from the game's internal browser.
 */
class ShopTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	function a_player_can_unlock_characters_by_spending_chevron()
	{
		Payment::through('chevron');

		$template = factory(CharacterTemplate::class)->create([
			'name' => 'Alyssa',
			'cost' => 1000,
			'currency' => 'chevron'
		]);
		$player = factory(Player::class)->create(['chevron' => 1000]);

		$this->signIn($player->user);

		$id = $this->json('POST', route('character.unlock'),
			['gateway' => 'chevron', 'name' => 'Alyssa', 'player_id' => $player->id])
			->assertSuccessful()
			->decodeResponseJson()['id'];

		$this->completePurchase($id);

		$this->assertDatabaseHas('purchases', [
			'buyer_id' => $player->id,
			'buyer_type' => 'player',
			'purchasable_id' => $template->id,
			'purchasable_type' => CharacterTemplate::class,
			'completed_at' => now()
		]);
	}

	/** @test */
	function a_player_can_unlock_characters_by_real_money()
	{
		Payment::fake();

		$template = factory(CharacterTemplate::class)->create(['name' => 'Alyssa', 'cost' => 1000]);
		$player = factory(Player::class)->create();

		$this->signIn($player->user);

		$id = $this->json('POST', route('character.unlock'),
			['name' => 'Alyssa', 'player_id' => $player->id])
			->assertSuccessful()
			->decodeResponseJson()['id'];

		$this->completePurchase($id);

		$this->assertDatabaseHas('purchases', [
			'buyer_id' => $player->id,
			'buyer_type' => 'player',
			'purchasable_id' => $template->id,
			'purchasable_type' => CharacterTemplate::class,
			'completed_at' => now()
		]);
	}

	/** @test */
	public function unlocking_characters_fails_if_player_id_is_not_specified()
	{
		$this->enableExceptionHandling();

		$player = factory(Player::class)->create(['chevron' => 1000]);
		$template = factory(CharacterTemplate::class)->create(['name' => 'Alyssa', 'cost' => 1000]);

		$this->signIn($player->user);

		$this->json('POST', route('character.unlock'), ['id' => $template->id, 'gateway' => 'chevron'])
			->assertValidationErrors('player_id');
	}

	/** @test */
	function a_player_can_purchase_products_for_real_money()
	{
		Payment::fake();

		$player = factory(Player::class)->create();
		$boost = factory(Product::class)->states('published')->create([
			'is_virtual' => true,
			'type' => 'Experience Boost',
			'lifetime' => '1 month',
			'name' => '1 month 25% experience boost',
			'description' => 'Gain 25% additional experience through the month!',
			'command' => 'apply:experience-boost',
			'value' => '25'
		]);

		$this->signIn($player->user);

		$id = $this->json('POST', route('product.purchase', $boost), ['player_id' => $player->id])
			->assertSuccessful()
			->decodeResponseJson()['id'];

		$this->completePurchase($id);

		$player->refresh();
		$this->assertEquals('125', $player->experience_rate);

		$this->assertDatabaseHas('purchases', [
			'buyer_id' => $player->id,
			'buyer_type' => 'player',
			'purchasable_id' => $boost->id,
			'purchasable_type' => Product::class,
		]);
	}

	/** @test */
	public function virtual_products_require_a_player_id()
	{
		$this->enableExceptionHandling();

		$player = factory(Player::class)->create();
		$boost = factory(Product::class)->states('published')->create([
			'is_virtual' => true,
			'type' => 'Experience Boost',
			'lifetime' => '1 month',
			'name' => '1 month 25% experience boost',
			'description' => 'Gain 25% additional experience through the month!',
			'command' => 'apply:experience-boost',
			'value' => '25'
		]);

		$this->signIn($player->user);

		$this->json('POST', route('product.purchase', $boost))
			->assertValidationErrors('player_id');

	}

	/** @test */
	public function cannot_purchase_unpublished_products()
	{
		$this->enableExceptionHandling();

		$product = factory(Product::class)->create();

		$this->signIn(factory(User::class)->create());

		$this->get(route('product.show', $product))
			->assertStatus(404);
	}

	private function completePurchase($id)
	{
		$this->postJson(route('purchase.complete'), [
			'order_id' => Purchase::find($id)->token,
			'currency' => 'DKK',
			'operations' => [['amount' => 100]],
			'metadata' => ['card' => 'Visa', ' last4' => 0000]
		])->assertSuccessful();
	}
}
