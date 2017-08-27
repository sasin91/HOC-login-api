<?php

namespace App\Billing;

use App\Billing\Testing\FakePaymentGateway;
use Illuminate\Support\Facades\Facade;

/**
 * Class Payment
 * @package App\Billing
 *
 * @method static PaymentGateway user($user)
 * @method static boolean requiresToken()
 * @method static string currency()
 * @method static string providerId()
 * @method static int totalCharges()
 * @method static int totalRefunds()
 * @method static \App\Transaction charge($amount, array $options = [])
 * @method static \App\Transaction refund($amount, $charge_id)
 */
class Payment extends Facade
{	
	/**
     * Replace the bound instance with a fake.
     *
     * @return void
     */
	public static function fake()
	{
		static::swap(new FakePaymentGateway);
	}

	/**
	 * Get a payment gateway instance
	 *
	 * @param string $driver
	 * @return PaymentGateway
	 */
	public static function gateway($driver)
	{
		return resolve(PaymentGatewayManager::class)->driver($driver);
	}

	/**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
	protected static function getFacadeAccessor()
	{
		return PaymentGateway::class;
	}
}