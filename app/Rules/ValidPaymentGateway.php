<?php

namespace App\Rules;


use App\Billing\Manager;

class ValidPaymentGateway
{
	/**
	 * Determine if the given attribute is a valid payment gateway.
	 *
	 * @param  string $attribute
	 * @param  string $value
	 * @return bool
	 */
	public function passes($attribute, $value)
	{
		try {
			resolve(Manager::class)->driver($value);
		} catch (\InvalidArgumentException $e) {
			return false;
		}

		return true;
	}
}