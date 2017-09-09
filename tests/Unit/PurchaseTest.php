<?php

namespace Tests\Unit;

use App\Events\CreatedPurchase;
use App\Listeners\GeneratePurchaseToken;
use App\Player;
use App\Product;
use App\Purchase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class PurchaseTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_generates_a_token_when_created()
	{
		Event::fake();

		factory(Purchase::class)->create();

		Event::assertDispatched(CreatedPurchase::class, function ($e) {
			$this->app->make(GeneratePurchaseToken::class)->handle($e);

			return !is_null($e->purchase->token);
		});
	}

	/** @test */
	public function user_can_purchase_a_product_for_a_player()
	{
		$product = create(Product::class);

		$user = create(User::class);
		$player = $user->players()->save(make(Player::class));

		$purchase = $user->purchase($product, $player);

		$this->assertTrue($purchase->buyer->is($user));
		$this->assertTrue($purchase->owner->is($player));

		$this->assertTrue($player->gifts->contains($purchase));
	}

	/** @test */
	public function user_can_purchase_a_product_for_another_user()
	{
		$product = create(Product::class);

		$john = create(User::class);
		$jane = create(User::class);

		$purchase = $john->purchase($product, $jane);

		$this->assertTrue($purchase->buyer->is($john));
		$this->assertTrue($purchase->owner->is($jane));

		$this->assertTrue($jane->gifts->contains($purchase));
	}

	/** @test */
	public function user_can_gift_a_purchase_to_another_user()
	{
		$product = create(Product::class);

		$john = create(User::class);
		$jane = create(User::class);

		$purchase = $john->purchase($product);
		$this->assertNull($purchase->owner, "Purchase has an unexpected owner.");

		$gift = $john->gift($purchase, $jane);

		$this->assertTrue($gift->buyer->is($john));
		$this->assertTrue($gift->owner->is($jane));

		$this->assertTrue($jane->gifts->contains($gift));
	}
}
