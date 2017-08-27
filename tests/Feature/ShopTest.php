<?php

namespace Tests\Feature;

use App\Billing\Payment;
use App\CharacterTemplate;
use App\Player;
use App\Product;
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
		$template = factory(CharacterTemplate::class)->create(['name' => 'Alyssa', 'cost' => 1000]);
		$player = factory(Player::class)->create(['chevron' => 1000]);

		$this->signIn($player->user);

		$this->json('POST', route('character.unlock'),
			['gateway' => 'chevron', 'name' => 'Alyssa', 'player_id' => $player->id])
			->assertSuccessful();

		$this->assertDatabaseHas('purchases', [
			'buyer_id' => $player->id,
			'buyer_type' => Player::class,
			'purchasable_id' => $template->id,
			'purchasable_type' => CharacterTemplate::class,
		]);
	}

	/** @test */
	function a_player_can_unlock_characters_by_real_money()
	{
		Payment::fake();

		$template = factory(CharacterTemplate::class)->create(['name' => 'Alyssa', 'cost' => 1000]);
		$player = factory(Player::class)->create();

		$this->signIn($player->user);

		$this->json('POST', route('character.unlock'),
			['name' => 'Alyssa', 'player_id' => $player->id, 'payment_token' => Payment::getValidTestToken()])
			->assertSuccessful();

		$this->assertDatabaseHas('purchases', [
			'buyer_id' => $player->id,
			'buyer_type' => Player::class,
			'purchasable_id' => $template->id,
			'purchasable_type' => CharacterTemplate::class,
		]);
	}

	/** @test */
	public function unlocking_characters_fails_if_player_id_is_not_specified()
	{
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

		$this->json('POST', route('product.purchase', $boost),
			['player_id' => $player->id, 'payment_token' => Payment::getValidTestToken()])
			->assertSuccessful();

		$player->refresh();
		$this->assertEquals('125', $player->experience_rate);

		$this->assertDatabaseHas('purchases', [
			'buyer_id' => $player->id,
			'buyer_type' => Player::class,
			'purchasable_id' => $boost->id,
			'purchasable_type' => Product::class,
		]);
	}

	/** @test */
	public function virtual_products_require_a_player_id()
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

		$this->json('POST', route('product.purchase', $boost), ['payment_token' => Payment::getValidTestToken()])
			->assertValidationErrors('player_id');

	}

	/** @test */
	public function cannot_purchase_unpublished_products()
	{
		$product = factory(Product::class)->create();

		$this->signIn(factory(User::class)->create());

		$this->get(route('product.show', $product))
			->assertStatus(404);
	}
}
