<?php

namespace App\Events;

use App\Purchase;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SavingPurchase
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Purchase
     */
    public $purchase;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($purchase)
    {
        $this->purchase = $purchase;
    }
}
