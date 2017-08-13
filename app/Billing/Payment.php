<?php

namespace App\Billing;

use App\Billing\Testing\FakePaymentGateway;
use Illuminate\Support\Facades\Facade;

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