<?php

namespace App\Billing\Quickpay\Concerns;

use App\Billing\Quickpay\Request;
use Illuminate\Support\Fluent;

trait FulfillsRequests
{
	/**
	 * Fulfill a given request object.
	 *
	 * @param Request $request
	 * @return Fluent
	 */
	public function fulfill($request)
	{
		$response = $this->http->request("{$request->method}", "{$request->uri}", $request->parameters);

		return new Fluent(
			json_decode($response->getBody()->getContents())
		);
	}
}