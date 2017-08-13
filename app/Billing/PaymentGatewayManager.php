<?php

namespace App\Billing;

use Illuminate\Support\Manager;

class PaymentGatewayManager extends Manager
{
    /**
     * The array of created "drivers".
     *
     * @var array
     */
    protected $drivers = [
    	CashierGateway::class,
    	ChevronGateway::class
    ];

	/**
     * Get the default driver name.
     *
     * @return string
     */
	public function getDefaultDriver()
	{
		return ChevronGateway::class;
	}

    /**
     * Get a driver instance.
     *
     * @param  string  $driver
     * @return PaymentGateway
     */
    public function driver($driver = null)
    {
        return parent::driver($driver);
    }
}