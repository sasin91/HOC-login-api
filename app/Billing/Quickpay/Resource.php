<?php

namespace App\Billing\Quickpay;

use App\Billing\Quickpay\Concerns\CreatesRequests;
use App\Billing\Quickpay\Concerns\FulfillsRequests;
use App\Fluent;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Support\Traits\Macroable;

/**
 * Class Resource
 * @package App\Billing\Quickpay
 *
 * @method Fluent|Request payment($id = null)
 * @method Request me()
 * //
 */
class Resource
{
	use CreatesRequests, FulfillsRequests, Macroable {
		__call as macroCall;
	}

	const API_VERSION = 'v10';

	const API_URL = 'https://api.quickpay.net/';

	/**
	 * The HTTP client.
	 *
	 * @var Guzzle
	 */
	protected $http;

	/**
	 * Client constructor.
	 */
	public function __construct()
	{
		$this->http = new Guzzle([
			'base_uri' => self::API_URL,
			'headers' => [
				'accept' => 'application/json',
				'accept-version' => self::API_VERSION,
				'Authorization' => 'Basic ' . base64_encode(config('services.quickpay.key'))
			]
		]);
	}

	/**
	 * dynamically call a macro or request.
	 *
	 * @param string $method
	 * @param array $parameters
	 * @return mixed { macroCall result or dynamic Request }
	 */
	public function __call($method, $parameters = [])
	{
		if (static::hasMacro($method)) {
			return $this->macroCall($method, $parameters);
		}

		return $this->request(str_plural($method))->dynamic(...$parameters);
	}

	/**
	 * Create a link for given payment.
	 *
	 * @param array|object $payment
	 * @param integer $amount
	 * @return Fluent { url: string, payment_id: string }
	 */
	public function link($payment, $amount)
	{
		$payment = is_object($payment) ? $payment : new Fluent($payment);

		return $this->request("/payments/{$payment->id}/link")->put(compact('amount'));
	}
}