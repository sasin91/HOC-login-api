<?php

namespace App\Http\Controllers;

use App\Billing\GatewayException;
use App\Billing\Payment;
use App\Http\Requests\PurchaseProductRequest;
use App\Product;

class PurchaseProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api');
	}

	public function store(PurchaseProductRequest $request, Product $product)
	{
		$transaction = $this->chargeCustomer($product->cost, $request->payment_token);

		$owner = $request->player ?: $request->user();
		tap($owner->purchase($product), function ($purchase) use ($transaction) {
			$purchase->currency = $transaction->currency;
			$purchase->amount = $transaction->amount;

			$purchase->save();
		});

		return $product->apply($owner);
	}

	/**
	 * Attempt charging the customer.
	 *
	 * @param integer $cost
	 * @param string $token
	 * @return \App\Transaction
	 */
	protected function chargeCustomer($cost, $token = null)
	{
		try {
			return Payment::user(request()->user())->charge($cost, ['payment_token' => $token]);
		} catch (GatewayException $e) {
			abort($e->getCode(), $e->getMessage());
		}
	}
}
