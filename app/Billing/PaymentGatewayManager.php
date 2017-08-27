<?php

namespace App\Billing;

use Illuminate\Support\Manager;

class PaymentGatewayManager extends Manager
{
	/**
     * Get the default driver name.
     *
     * @return string
     */
	public function getDefaultDriver()
	{
		return ChevronGateway::class;
	}

    protected function getChevronDriver()
    {
        return $this->app->make(ChevronGateway::class);
    }

    protected function getCashierDriver()
    {
        return $this->app->make(CashierGateway::class);
    }
}