<?php

namespace Tests\Browser;

use App\Billing\Quickpay;
use App\Purchase;
use Faker\Generator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class QuickpayTest extends DuskTestCase
{
	use DatabaseMigrations;

	/**
	 * @var Quickpay
	 */
	protected $quickPay;

	public function setUp()
	{
		parent::setUp();

		$this->app['config']->set('database.default', 'testing');

		$this->runDatabaseMigrations();

		$this->seed(\PermissionsTableSeeder::class);

		$this->quickPay = $this->app->make(Quickpay::class);
	}

	/** @test */
	public function customer_can_purchase_a_product()
	{
		$purchase = factory(Purchase::class)->create();
		$purchase->forceFill(['token' => str_random()]);

		$this->browse(function (Browser $browser) use ($purchase) {
			/** @var Generator $faker */
			$faker = $this->app[Generator::class];

			$browser->visit($this->quickPay->link($purchase)->url)
				->type('cardnumber', '1000 0000 0000 0008')
				->type('expiration[month]', $faker->month)
				->type('expiration[year]', $faker->year)
				->type('cvd', $faker->randomNumber(3))
				->press('Pay')
				->waitForText('You have completed the payment', 5);
		});
	}
}
