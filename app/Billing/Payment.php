<?php

namespace App\Billing;

use App\Billing\Quickpay\Quickpay;
use Illuminate\Support\Facades\Facade;

/**
 * Class Payment
 * @package App\Billing
 *
 * @method static mixed refund($purchase)
 * @method static mixed charge($purchase)
 */
class Payment extends Facade
{
	/**
	 * Swap the registered instance for a Fake.
	 *
	 * @return Fake | PaymentGateway
	 */
	public static function fake()
	{
		static::swap(new Fake);

		return static::getFacadeRoot();
	}

	/**
	 * Swap the default payment driver for a specific one.
	 *
	 * @param string $driver
	 * @return PaymentGateway
	 */
	public static function through($driver)
	{
		return tap(static::driver($driver), function ($driver) {
			static::swap($driver);
		});
	}

	/**
	 * Resolve a specific payment driver once, without swapping.
	 *
	 * @param string $driver
	 * @return PaymentGateway
	 */
	public static function driver($driver)
	{
		return static::$app->make(Manager::class)->driver($driver);
	}

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return PaymentGateway::class;
	}
}