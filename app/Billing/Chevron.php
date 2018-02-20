<?php

namespace App\Billing;

class Chevron implements PaymentGateway
{
    protected $player;

    /**
     * @inheritDoc
     */
    public function charge($purchase)
    {
        $this->validate($purchase);

        $chevron = $this->user()->chevron;
        $amount = $purchase->amount;

        throw_if($amount > $chevron, \RuntimeException::class, 'Insufficient funds.');

        $this->user()
            ->forceFill(['chevron' => $chevron - $amount])
            ->saveOrFail();

        return $purchase;
    }

    protected function validate($purchase)
    {
        throw_unless(
            $purchase->currency == 'chevron',
            \InvalidArgumentException::class,
            "Invalid currency [{$purchase->currency}]."
        );
    }

    /**
     * @inheritDoc
     */
    public function user($player = null)
    {
        if ($player) {
            $this->player = $player;
        }

        return tap($this->player, function ($player) {
            throw_unless($player, \RuntimeException::class, 'No player defined.');
        });
    }

    /**
     * @inheritDoc
     */
    public function refund($purchase)
    {
        $this->validate($purchase);

        $this->user()
            ->forceFill(['chevron' => $this->user()->chevron + $purchase->amount])
            ->saveOrFail();

        return $purchase;
    }
}
