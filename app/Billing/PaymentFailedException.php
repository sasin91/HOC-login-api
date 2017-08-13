<?php

namespace App\Billing;

class PaymentFailedException extends GatewayException
{
    public static function insufficientFunds(int $attempt, int $available)
    {
        return new static("Attempt to pull [{$attempt}] amount while only having [{$available}] available.", 422);
    }

    public static function invalidToken(string $token, \Exception $previous = null)
    {
        return new static("Invalid token [{$token}].", 402, $previous);
    }

    public static function userMissing(
        string $message = "Payment failed due no authenticated User given.",
        int $code = 422
    ) {
        return new static($message, $code);
    }
}
