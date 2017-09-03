<?php

namespace App\Billing;


class Manager extends \Illuminate\Support\Manager
{
	/**
	 * @inheritDoc
	 */
	public function getDefaultDriver()
	{
		return 'quickPay';
	}

	public function createQuickPayDriver()
	{
		return $this->app->make(Quickpay::class);
	}

	public function createChevronDriver()
	{
		return new Chevron;
	}
}