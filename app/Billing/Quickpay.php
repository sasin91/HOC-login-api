<?php

namespace App\Billing;

use App\Fluent;
use App\Purchase;

class Quickpay implements PaymentGateway
{
	/**
	 * @var Resource
	 */
	protected $resource;

	protected $user;

	/**
	 * Quickpay constructor.
	 *
	 * @param Quickpay\Resource $resource
	 */
	public function __construct(Quickpay\Resource $resource)
	{
		$this->resource = $resource;
	}

	/**
	 * @inheritDoc
	 */
	public function user($user = null)
	{
		if ($user) {
			$this->user = $user;
		}

		return $this->user;
	}

	/**
	 * Dynamically call a resource.
	 *
	 * @param string $uri
	 * @param mixed $parameters
	 * @return mixed { Resource::__call }
	 */
	public function __call($uri, $parameters)
	{
		return $this->resource->$uri(...$parameters);
	}

	/**
	 * @inheritdoc
	 */
	public function charge($purchase)
	{
		session('purchase_token', $purchase->token);

		$payment = $this->paymentFor($purchase);

		return redirect($this->link($payment, $purchase->amount)->url);
	}

	/**
	 * Create a payment resource for given purchase.
	 *
	 * @param Purchase $purchase
	 * @return Fluent
	 */
	public function paymentFor($purchase)
	{
		return $this->resource->payment()->create([
			'order_id' => $purchase->token,
			'currency' => $purchase->currency,
		])->tap(function ($payment) use ($purchase) {
			$purchase->update([
				'provider_id' => $payment->id,
				'currency' => $purchase->currency,
				'amount' => $purchase->amount,
			]);
		});
	}

	/**
	 * Get a link resource.
	 *
	 * @param object $payment
	 * @param integer $amount
	 * @return Fluent
	 */
	public function link($payment, $amount = null)
	{
		if ($payment instanceof Purchase) {
			$amount = $payment->amount;
			$payment = $this->paymentFor($payment);
		}

		return $this->resource->link($payment, $amount);
	}

	/**
	 * @inheritdoc
	 */
	public function refund($purchase)
	{
		return $this->resource
			->payment($purchase->provider_id)
			->refund()->create(['amount' => $purchase->amount]);
	}
}