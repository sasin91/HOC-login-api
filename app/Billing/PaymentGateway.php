<?php

namespace App\Billing;

use App\Purchase;
use Illuminate\Database\Eloquent\Model;

interface PaymentGateway
{
    /**
     * Set the User object if given,
     * then return the current.
     *
     * @param null|Model $user
     * @throws \RuntimeException
     *
     * @return null|Model
     */
    public function user($user = null);

    /**
     * Make a "one off" charge on the customer for the given amount.
     *
     * @param  Purchase $purchase
     *
     * @return Purchase
     *
     * @throws \Exception
     */
    public function charge($purchase);

    /**
     * Refund a customer for a charge.
     *
     * @param  Purchase $purchase
     *
     * @return Purchase
     *
     * @throws \Exception
     */
    public function refund($purchase);
}
