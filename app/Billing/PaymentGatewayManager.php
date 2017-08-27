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
		return 'chevron';
	}

	protected function createChevronDriver()
    {
        return $this->app->make(ChevronGateway::class);
    }

	protected function createCashierDriver()
    {
        return $this->app->make(CashierGateway::class);
    }
}