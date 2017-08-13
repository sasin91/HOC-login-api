<?php

namespace App\Billing;

use App\Billing\Data\Charge;
use App\Billing\Data\Refund;

class ChevronGateway implements PaymentGateway
{
    use CanDispatchEvents, HasUser, HasLocalInvoices, HasLocalReceipts;

    /**
     * @var array
     */
    protected $charges = [];

    /**
     * @var array
     */
    protected $refunds = [];

    /**
     * Provider id for invoices & receipts.
     *
     * @return string
     */
    public function providerId()
    {
        return 'ingame_chevron_';
    }

    /**
     * Whether the gateway requires a token to process the payment.
     *
     * @return boolean
     */
    public function requiresToken()
    {
        return false;
    }

    /**
     * Get the total amount of charges
     *
     * @return integer
     */
    public function totalCharges()
    {
        return collect($this->charges)->sum('amount');
    }

    /**
     * Get the total amount of refunds
     *
     * @return integer
     */
    public function totalRefunds()
    {
        return collect($this->refunds)->sum('amounts');
    }

    /**
     * Make a "one off" charge on the customer for the given amount.
     *
     * @param  int   $amount
     * @param  array $options
     *
     * @return \App\Billing\Data\Charge
     *
     * @throws \Exception
     */
    public function charge($amount, array $options = [])
    {
        $this->verifyUser();

        $negativeAmount = -1 * abs($amount);
        if ($negativeAmount > $this->user()->points) {
            throw PaymentFailedException::insufficientFunds($amount, $this->user()->chevron);
        }

	    $chevron = $this->user()->chevrons()->create(['amount' => $negativeAmount]);

	    return tap(new Charge, function (Charge $charge) use ($amount, $chevron) {
            $charge->fill([
	            'id' => $chevron->getKey(),
                'amount' => $amount,
                'currency' => 'chevron',
                'status' => 'closed',
                'invoices' => [],
                'payment' => [
                    'type' => 'Point transfer',
                    'card' => [
                        'type' => null,
                        'holder' => $this->user()->name,
                        'last_four' => null,
                    ]
                ],
            ]);

		    $this->charges[$chevron->getKey()] = $charge;
        });
    }

    protected function verifyUser()
    {
        if (!$this->user()) {
            throw PaymentFailedException::userMissing();
        }
    }

    /**
     * Refund a customer for a charge.
     *
     * @param  string $amount
     * @param  array  $options
     *
     * @return \App\Billing\Data\Refund
     *
     * @throws \Exception
     */
	public function refund($amount, $charge_id = null)
    {
        $this->verifyUser();

	    $this->user()->chevrons()->create(['amount' => abs($amount)]);

	    return tap(new Refund, function (Refund $refund) use ($amount, $charge_id) {
		    $refund->fill([
			    'id' => $charge_id,
			    'amount' => $amount,
			    'currency' => 'chevron',
			    'status' => 'closed',
			    'invoices' => [],
		    ]);

		    $this->refunds[$charge_id] = $refund;
	    });
    }

    /**
     * Get all of the subscriptions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function subscriptions()
    {
        throw new \Exception('Method not supported.');
    }

    /**
     * Get a subscription instance by name.
     *
     * @param  string $subscription
     *
     * @return object|null
     */
    public function subscription($subscription = 'default')
    {
        throw new \Exception('Method not supported.');
    }

    /**
     * Begin creating a new subscription.
     *
     * @param  string      $subscription
     * @param  string|null $plan
     *
     * @return object
     */
    public function subscribeTo($subscription, $plan = null)
    {
        throw new \Exception('Method not supported.');
    }

    /**
     * Determine if there is a given subscription.
     *
     * @param  string      $subscription
     * @param  string|null $plan
     *
     * @return bool
     */
    public function subscribed($subscription = 'default', $plan = null)
    {
        throw new \Exception('Method not supported.');
    }
}
