<?php

namespace App\Http\Controllers;

use App\Billing\GatewayException;
use App\Billing\PaymentGateway;
use App\Http\Requests\PurchaseCharacterRequest;

class UnlockCharacterController extends Controller
{
	public function store(PurchaseCharacterRequest $request, PaymentGateway $gateway)
	{
		$template = $request->character_template;

		try {
			$transaction = $gateway->user($request->player)->charge($template->cost,
				['payment_token' => $request->payment_token]);

			return tap($request->player->purchase($template), function ($purchase) use ($transaction) {
				$purchase->currency = $transaction->currency;
				$purchase->amount = $transaction->amount;

				$purchase->save();
			});

		} catch (GatewayException $e) {
			return response()->json($e->getMessage(), $e->getCode());
		}
	}
}
