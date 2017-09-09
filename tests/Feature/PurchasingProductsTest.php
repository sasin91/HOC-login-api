<?php

namespace Tests\Feature;

use App\Billing\Payment;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PurchasingProductsTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
	{
		parent::setUp();

		Payment::fake();
	}

	/** @test */
	public function user_can_purchase_a_gift_for_another_user()
	{
		$this->enableExceptionHandling();

		$product = factory(Product::class)->states('published')->create([
			'type' => "Valentine's heart",
			'value' => 'with extra chocolate'
		]);

		$this->signIn($john = create(User::class));
		$jane = create(User::class);

		$this->assertCount(0, $jane->gifts);

		$this->post(route('product.purchase', $product), ['owner' => ['type' => 'user', 'id' => $jane->id]])
			->assertSuccessful();

		$this->assertEquals(1, $jane->gifts()->count());
	}

	/** @test */
	public function cannot_purchase_a_gift_for_a_non_existing_model()
	{
		$this->enableExceptionHandling();

		$product = factory(Product::class)->states('published')->create();

		$this->signIn();

		$this->post(route('product.purchase', $product),
			['owner' => ['type' => 'bogus', 'id' => 999]])->assertStatus(302);

		$this->assertDatabaseMissing('purchases', [
			'owner_type' => 'bogus',
			'owner_id' => 999
		]);
	}
}
