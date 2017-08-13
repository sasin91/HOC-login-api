<?php

namespace App\Billing;

/**
 * Class GatewayException
 *
 * @package \App\Billing
 */
class GatewayException extends \RuntimeException
{
    public static function invalidUser($message = "Invalid user given.", int $code = 422)
    {
        return new static($message, $code);
    }

    public static function missingUser()
    {
        return new static("No user found on PaymentGateway.", 500);
    }
}
