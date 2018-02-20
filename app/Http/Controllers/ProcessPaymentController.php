<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessPaymentRequest;
use App\Purchase;

class ProcessPaymentController extends Controller
{
    public function store(ProcessPaymentRequest $request)
    {
        $purchase = Purchase::whereToken($request->order_id)->first();

        return tap($purchase)->update([
            'completed_at' => now(),
            'currency' => $request->currency,
            'amount' => array_get(last($request->operations), 'amount'),
            'payment_type' => array_get($request->metadata, 'card'),
            'card_last_four' => array_get($request->metadata, 'last4'),
        ])->apply();
    }
}
