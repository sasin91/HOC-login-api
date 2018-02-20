<?php

namespace App\Http\Controllers;

use App\Billing\GatewayException;
use App\Billing\PaymentGateway;
use App\Http\Requests\PurchaseCharacterRequest;

class UnlockCharacterController extends Controller
{
    public function store(PurchaseCharacterRequest $request, PaymentGateway $gateway)
    {
        $gateway->user($request->player);
        $template = $request->character_template;

        try {
            return $gateway->charge($request->player->purchase($template));
        } catch (\RuntimeException $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
}
