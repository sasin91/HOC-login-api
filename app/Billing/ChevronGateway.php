<?php

namespace App\Billing;

use App\Transaction;

class ChevronGateway implements PaymentGateway
{
    /**
     * The user being charged.
     * 
     * @var \App\Player
     */
    protected $player;

    /**
     * @var array
     */
    protected $charges = [];

    /**
     * @var array
     */
    protected $refunds = [];

	/**
	 * @inheritdoc
	 */
	public function user($user)
    {
	    $this->player = $user;

        return $this;
    }

	public function player()
	{
		return $this->player;
	}

	/**
	 * @inheritdoc
	 */
    public function providerId()
    {
        return 'ingame_chevron_'.str_random();
    }

	/**
	 * @inheritdoc
	 */
	public function currency()
	{
		return 'chevron';
	}

	/**
	 * @inheritdoc
	 */
    public function requiresToken()
    {
        return false;
    }

	/**
	 * @inheritdoc
	 */
    public function totalCharges()
    {
        return collect($this->charges)->sum('amount');
    }

	/**
	 * @inheritdoc
	 */
    public function totalRefunds()
    {
        return collect($this->refunds)->sum('refunded_amount');
    }

	/**
	 * @inheritdoc
	 */
    public function charge($amount, array $options = [])
    {
	    $this->verifyPlayer();
    	$this->verifyAmount($amount);

	    $chevron = $this->player()->chevron;

        if ($amount > $chevron) {
	        throw PaymentFailedException::insufficientFunds($amount, $this->player()->chevron);
        }

	    $this->player()->forceFill(['chevron' => $chevron - $amount])->saveOrFail();

	    $id = $this->providerId();

	    return $this->charges[$id] = new Transaction([
		    'user_id' => $this->player()->user->id,
	    	'gateway' => static::class,
			'provider_id' => $id,
			'amount' => $amount,
		    'currency' => 'chevron',
		    'payment_type' => 'ingame'
	    ]);
    }

    /**
     * @inheritdoc
     */
	public function refund($provider_id, $amount = null)
    {
    	$this->verifyPlayer();
    	$this->verifyAmount($amount);

	    $transaction = null;
	    if ($cached = array_pull($this->charges, $provider_id)) {
		    $transaction = $cached;
	    } else {
		    $transaction = Transaction::where('provider_id', $provider_id)->first();
	    }

    	if (is_null($transaction)) {
    		throw PaymentFailedException::invalidToken($provider_id);
	    }

	    $amount = $amount ?: $transaction->amount;

	    $this->player()->forceFill(['chevron' => $this->player()->chevron + $amount])->saveOrFail();

	    return $this->refunds[$provider_id] = $transaction->refund($amount);
    }

	/**
	 * @inheritdoc
	 */
    public function subscriptions()
    {
        throw new \Exception('Method not supported.');
    }

	/**
	 * @inheritdoc
	 */
    public function subscription($subscription = 'default')
    {
        throw new \Exception('Method not supported.');
    }

	/**
	 * @inheritdoc
	 */
    public function subscribeTo($subscription, $plan = null)
    {
        throw new \Exception('Method not supported.');
    }

	/**
	 * @inheritdoc
	 */
    public function subscribed($subscription = 'default', $plan = null)
    {
        throw new \Exception('Method not supported.');
    }

	/**
	 * @inheritDoc
	 */
	public function invoices($includePending = false, $parameters = [])
	{
		throw new \Exception('Method not supported.');
	}

	/**
	 * @inheritDoc
	 */
	public function findInvoice($id)
	{
		throw new \Exception('Method not supported.');
	}

	private function verifyPlayer()
	{
		if (is_null($this->player())) {
			throw GatewayException::missingUser();
		}
	}

	private function verifyAmount($amount)
	{
		if ($amount < 0 || $amount === 0) {
			throw GatewayException::invalidAmount($amount);
		}
	}
}
