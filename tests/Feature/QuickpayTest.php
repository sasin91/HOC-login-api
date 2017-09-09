<?php

namespace Tests\Feature;

use App\Product;
use App\Purchase;
use App\User;
use Faker\Generator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use VCR\VCR;

class QuickpayTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function can_charge_a_user()
	{
		/** @var Generator $faker */
		$faker = $this->app[Generator::class];
		$this->signIn($user = factory(User::class)->create());

		$product = factory(Product::class)->states('published')->create(['is_virtual' => false, 'currency' => 'DKK']);

		VCR::turnOn();
		VCR::configure()->enableLibraryHooks('curl')->setCassettePath(__DIR__ . '/../cassettes');
		VCR::insertCassette("quickpay.purchase_product");

		$this->post(route('product.purchase', $product))
			->assertRedirect()
			->assertHost('payment.quickpay.net');

		VCR::eject();
		VCR::turnOff();
	}

	/** @test */
	public function can_refund_a_purchase()
	{
		$this->signIn($user = factory(User::class)->create());

		// Provider ID must represent an actual payment.id on the API.
		$provider_id = 94840932;

		$purchase = factory(Purchase::class)->create([
			'amount' => 1,
			'completed_at' => now(),
			'provider_id' => $provider_id,
			'buyer_type' => User::class,
			'buyer_id' => $user->id
		]);

		VCR::turnOn();
		VCR::configure()->enableLibraryHooks('curl')->setCassettePath(__DIR__ . '/../cassettes');
		VCR::insertCassette("quickpay.refund_product");

		$this->post(route('purchase.refund', $purchase))
			->assertSuccessful();

		VCR::eject();
		VCR::turnOff();

		$this->assertDatabaseHas('purchases', [
			'id' => $purchase->id,
			'token' => $purchase->token,
			'refunded_at' => now()
		]);
	}

	/** @test */
	public function cannot_refund_a_purchase_the_user_have_not_bought()
	{
		$this->enableExceptionHandling();

		$purchase = factory(User::class)->create()->purchases()->save(factory(Purchase::class)->make());

		$this->signIn(factory(User::class)->create());

		$this->post(route('purchase.refund', $purchase))
			->assertStatus(403);

		$this->assertDatabaseHas('purchases', [
			'id' => $purchase->id,
			'token' => $purchase->token,
			'refunded_at' => null,
		]);
	}

	/** @test */
	public function it_completes_a_purchase_by_processing_the_provider_callback()
	{
		$purchase = factory(Purchase::class)->create(['amount' => 100, 'currency' => 'DKK']);

		$this->actingAs(factory(User::class)->create())
			->post('/api/process-payment', [
				'order_id' => $purchase->token,
				'currency' => 'DKK',
				'operations' => [['amount' => 100]],
				'metadata' => ['card' => 'Visa', ' last4' => 0000]
			])
			->assertSuccessful();

		$this->assertDatabaseHas('purchases', [
			'id' => $purchase->id,
			'token' => $purchase->token,
			'completed_at' => now()->format('Y-m-d H:i:s')
		]);
	}
}
