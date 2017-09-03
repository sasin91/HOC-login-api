<?php

namespace Tests\Unit;

use App\Events\CreatedPurchase;
use App\Listeners\GeneratePurchaseToken;
use App\Purchase;
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
}
