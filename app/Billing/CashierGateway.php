<?php

namespace App\Billing;

use App\Billing\Data\Charge;
use App\Billing\Data\Refund;
use App\Transaction;

class CashierGateway implements PaymentGateway
{
	use CanDispatchEvents, HasUser;

	/**
	 * The current resource ID.
	 *
	 * @var string
	 */
	private $provider_id;

    /**
     * @var array
     */
    protected $charges = [];

    /**
     * @var array
     */
    protected $refunds = [];

	/**
	 * Provider ID.
	 *
	 * @return string
	 */
	public function providerId()
	{
		return $this->provider_id;
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
	    return collect($this->refunds)->sum('refunded_amount');
    }

    /**
     * Pass dynamic methods into the Billable entity.
     *
     * @param $method
     * @param array $parameters
     */
    public function __call($method, array $parameters = [])
    {
	    return call_user_func_array([$this->user(), $method], $parameters);
    }

    /**
     * Whether the gateway requires a token to process the payment.
     *
     * @return boolean
     */
    public function requiresToken()
    {
        return true;
    }

	/**
	 * @inheritdoc
	 */
    public function charge($amount, array $options = [])
    {
	    $this->fireGatewayEvent('charging');
	    try {
		    $charge = $this->user()->charge($amount, $options);

		    $id = $this->provider_id = $charge->id;

		    return $this->charges[$id] = new Transaction([
			    'user_id' => $this->user->id,
			    'gateway' => static::class,
			    'provider_id' => $id,
			    'amount' => $amount,
			    'currency' => 'chevron',
			    'payment_type' => 'ingame'
		    ]);

		    return $this->charges[] = new Charge([
			    'amount' => $amount,
			    'description' => $charge->description,
			    'currency' => $charge->currency,
			    'status' => $charge->status,
			    'invoices' => [$charge->invoice],
			    'payment' => [
				    'type' => $charge->source->funding, // credit
				    'card' => [
					    'type' => $charge->source->branding, // VISA, MasterCard...
					    'holder' => $charge->source->name,
					    'last_four' => $charge->source->last4
				    ]
			    ]
		    ]);
	    } catch (\Exception $e) {
		    throw new GatewayException($e->getMessage(), $e->getCode());
	    } finally {
		    $this->fireGatewayEvent('charged');
	    }
    }

	/**
	 * @inheritdoc
	 */
	public function refund($amount, $charge_id = null)
    {
	    $this->fireGatewayEvent('refunding', $amount);

	    try {
		    $refund = $this->user()->refund($amount, ['charge' => $charge_id]);

		    return $this->refunds[] = new Refund([
			    'id' => $this->provider_id = $refund->id,
			    'amount' => $amount,
			    'description' => $refund->description,
			    'reason' => $refund->reason,
			    'status' => $refund->status
		    ]);
	    } catch (\Exception $e) {
		    throw new GatewayException($e->getMessage(), $e->getCode());
	    } finally {
		    $this->fireGatewayEvent('refunded', $amount);
	    }
    }

    /**
     * Find an invoice by ID.
     *
     * @param  string $id
     * @return object|null
     */
    public function findInvoice($id)
    {
        return $this->user()->findInvoice($id);
    }

    /**
     * Get a collection of the entity's invoices.
     *
     * @param  bool  $includePending
     * @param  array $parameters
     * @return \Illuminate\Support\Collection
     */
    public function invoices($includePending = false, $parameters = [])
    {
        return $this->user()->invoices($includePending, $parameters);
    }

    /**
     * Get all of the subscriptions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function subscriptions()
    {
        return $this->user()->subscriptions();
    }

    /**
     * Get a subscription instance by name.
     *
     * @param  string $subscription
     * @return object|null
     */
    public function subscription($subscription = 'default')
    {
        return $this->user()->subscription($subscription);
    }

    /**
     * Begin creating a new subscription.
     *
     * @param  string      $subscription
     * @param  string|null $plan
     * @return object
     */
    public function subscribeTo($subscription, $plan = null)
    {
        return $this->user()->newSubscription($subscription, $plan);
    }

    /**
     * Determine if there is a given subscription.
     *
     * @param  string      $subscription
     * @param  string|null $plan
     * @return bool
     */
    public function subscribed($subscription = 'default', $plan = null)
    {
        return $this->user()->subscribed($subscription, $plan);
    }
}
