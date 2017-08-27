<?php

namespace App\Billing;

/**
 * Class GatewayException
 *
 * @package \App\Billing
 */
class GatewayException extends \RuntimeException
{
	public static function invalidAmount($amount)
	{
		return new static("Invalid amount [{$amount}].", 422);
	}

    public static function invalidUser($user = null)
    {
    	$user = is_object($user) ? get_class($user) : $user;

        return new static("Invalid user [{$user}].", 422);
    }

    public static function missingUser()
    {
        return new static("No user found on PaymentGateway.", 500);
    }
}
