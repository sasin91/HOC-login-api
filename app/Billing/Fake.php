<?php

namespace App\Billing;

class Fake implements PaymentGateway
{
    protected $charges = [];

    protected $refunds = [];

    protected $user;

    /**
     * @inheritDoc
     */
    public function user($user = null)
    {
        if ($user) {
            $this->user = $user;
        }

        return tap($this->user, function ($user) {
            throw_unless($user, \RuntimeException::class, 'No user defined.');
        });
    }

    public function totalCharges()
    {
        return array_reduce($this->charges, function ($charge, $prev) {
            return $charge->amount + $prev->amount;
        });
    }

    public function totalRefunds()
    {
        return array_reduce($this->refunds, function ($refund, $prev) {
            return $refund->amount + $prev->amount;
        });
    }

    /**
     * @inheritDoc
     */
    public function charge($purchase)
    {
        $purchase->update(['provider_id' => str_random()]);

        return $this->charges[$purchase->provider_id] = $purchase;
    }

    /**
     * @inheritDoc
     */
    public function refund($purchase)
    {
        return $this->refunds[$purchase->provider_id] = $purchase;
    }
}
