<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Http\Requests\RefundPurchaseRequest;
use App\Purchase;

class RefundPurchaseController extends Controller
{
    public function store(RefundPurchaseRequest $request, Purchase $purchase, PaymentGateway $gateway)
    {
        $purchase->fill($request->intersect(['amount', 'currency']));

        try {
            $gateway->refund($purchase);

            $purchase->refund();

            return response()->json([$purchase->delete()]);
        } catch (\RuntimeException $e) {
            abort($e->getCode(), $e->getMessage());
        }
    }
}
