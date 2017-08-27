<?php

namespace App\Billing\Testing;

use App\Billing\Data\Charge;
use App\Billing\Data\Refund;
use App\Billing\PaymentFailedException;
use App\Billing\PaymentGateway;
use App\Transaction;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PHPUnit\Framework\Assert as PHPUnit;

class FakePaymentGateway implements PaymentGateway
{
	public static $chargingCallback;
	public static $chargedCallback;

	private $provider_id;

	protected $charges;
	protected $refunds;
	protected $invoices;
	protected $receipts;
	protected $subscriptions;

	public function __construct()
	{
		$this->charges = new Collection;
		$this->refunds = new Collection;
		$this->invoices = new Collection;
		$this->receipts = new Collection;
		$this->subscriptions = new Collection;
	}

	/**
	 * Register a callback to be ran when the Gateway is charging.
	 *
	 * @param \Closure $callback
	 * @param int      $priority
	 * @return void
	 */
	public static function charging($callback, $priority = 0)
	{
		static::$chargingCallback = $callback;
	}

	/**
	 * Register a callback to be ran when the Gateway has charged.
	 *
	 * @param \Closure $callback
	 * @param int      $priority
	 * @return void
	 */
	public static function charged($callback, $priority = 0)
	{
		static::$chargedCallback = $callback;
	}

	public function assertCharged($charge, $callback = null)
	{
		if (!is_string($charge)) {
			$charge = $charge->id;
		}

		PHPUnit::assertTrue($this->charges->has($charge), "The expected [{$charge}] charge was not found.");

		$callback = $callback ?: function () {
			return true;
		};

		return $callback($this->charges->get($charge));
	}

	public function assertRefunded($refund, $callback = null)
	{
		if (!is_string($refund)) {
			$refund = $refund->id;
		}

		PHPUnit::assertTrue($this->refunds->has($refund), "The expected [{$refund}] refund was not found.");

		$callback = $callback ?: function () {
			return true;
		};

		return $callback($this->refunds->get($refund));
	}

	/**
	 * @inheritdoc
	 */
	public function providerId()
	{
		return $this->provider_id ?: $this->provider_id = 'fake_' . Str::random();
	}

	/**
	 * @inheritdoc
	 */
	public function requiresToken()
	{
		return true;
	}

	/**
	 * @inheritdoc
	 */
	public function user($user)
	{
		$this->user = $user;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function currency()
	{
		return 'fake-currency';
	}

	public function totalCharges()
	{
		return $this->charges->sum('amount');
	}

	public function totalRefunds()
	{
		return $this->refunds->sum('amount');
	}

	/**
	 * @inheritdoc
	 */
	public function charge($amount, array $options = [])
	{
		if (static::$chargingCallback !== null) {
			$callback = static::$chargingCallback;
			static::$chargingCallback = null;
			$callback($this);
		}

		$this->tokenIsValid(array_get($options, 'payment_token'));

		if (static::$chargedCallback !== null) {
			$callback = static::$chargedCallback;
			static::$chargedCallback = null;
			$callback($this);
		}

		$id = Arr::get($options, 'id', $this->providerId());

		return $this->charges[$id] = new Transaction([
			'user_id' => $this->user->id,
			'gateway' => static::class,
			'provider_id' => $id,
			'amount' => $amount,
			'currency' => $this->currency(),
			'payment_type' => 'fake'
		]);
	}

	protected function tokenIsValid($token)
	{
		if (!$token || $token !== $this->getValidTestToken()) {
			throw PaymentFailedException::invalidToken($token);
		}
	}

	public function getValidTestToken()
	{
		return 'valid-token';
	}

	/**
	 * @inheritdoc
	 */
	public function refund($provider_id, $amount = null)
	{
		$transaction = null;
		if ($cached = $this->charges->pull($provider_id)) {
			$transaction = $cached;
		} else {
			$transaction = Transaction::where('provider_id', $provider_id)->first();
		}

		if (is_null($transaction)) {
			throw PaymentFailedException::invalidToken($provider_id);
		}

		$amount = $amount ?: $transaction->amount;

		return $this->refunds[$provider_id] = $transaction->refund($amount);
	}

	/**
	 * @inheritdoc
	 */
	public function findInvoice($id)
	{
		return $this->invoices()->first(function (array $invoice) use ($id) {
			return $invoice['id'] === $id;
		});
	}

	/**
	 * @inheritdoc
	 */
	public function invoices($includePending = false, $parameters = [])
	{
		return $this->invoices;
	}

	/**
	 * @inheritdoc
	 */
	public function subscribeTo($subscription, $plan = null)
	{
		return $this->subscriptions()->put("$subscription.subscribers", $this->user);
	}

	/**
	 * @inheritdoc
	 */
	public function subscriptions()
	{
		return $this->subscriptions;
	}

	/**
	 * @inheritdoc
	 */
	public function subscribed($subscription = 'default', $plan = null)
	{
		return $this->subscription($subscription)->contains('subscribers', $this->user);
	}

	/**
	 * @inheritdoc
	 */
	public function subscription($id = 'default')
	{
		return $this->subscriptions()->first(function (array $subscription) use ($id) {
			return $subscription['id'] === $id;
		});
	}
}
