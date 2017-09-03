<?php

namespace App\Billing\Quickpay\Concerns;

use App\Billing\Quickpay\Request;

trait CreatesRequests
{

	/**
	 * Get a Request for the given uri.
	 *
	 * @param string $uri
	 * @return Request
	 */
	public function request($uri)
	{
		return new Request($uri, $this);
	}
}