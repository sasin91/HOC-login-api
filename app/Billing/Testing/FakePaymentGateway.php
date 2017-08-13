<?php

namespace App\Billing\Testing;

use App\Billing\Data\Charge;
use App\Billing\Data\Refund;
use App\Billing\GatewayException;
use App\Billing\HasUser;
use App\Billing\PaymentFailedException;
use App\Billing\PaymentGateway;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PHPUnit\Framework\Assert as PHPUnit;

class FakePaymentGateway implements PaymentGateway
{
	use HasUser;

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
	 * The payment provider ID.
	 *
	 * @return string
	 */
	public function providerId()
	{
		return $this->provider_id ?? $this->provider_id = 'fake_' . Str::random();
	}

	public function requiresToken()
	{
		return true;
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
	 * Make a "one off" charge on the customer for the given amount.
	 *
	 * @param  int   $amount
	 * @param  array $options
	 * @return object
	 *
	 * @throws \Exception
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
		return Charge::make([
			'id' => $id,
			'country' => null,
			'amount' => $amount,
			'provider' => static::class,
			'invoices' => []
		])->tap(function ($charge) use ($id) {
			$this->charges->put($id, $charge);
		});
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
	 * Refund a customer for a charge.
	 *
	 * @param  string $amount
	 * @param  array  $options
	 * @return object
	 *
	 * @throws \Exception
	 */
	public function refund($amount, $charge_id = null)
	{
		if (!$this->charges->has($charge_id)) {
			throw new GatewayException("Cannot refund an non-existing charge.", 422);
		}

		return Refund::make([
			'id' => $this->providerId(),
			'charge_id' => $charge_id,
			'amount' => $amount
		])->tap(function ($refund) {
			$this->refunds->put($this->providerId(), $refund);
		});
	}

	/**
	 * Find an invoice by ID.
	 *
	 * @param  string $id
	 * @return object|null
	 */
	public function findInvoice($id)
	{
		return $this->invoices()->first(function (array $invoice) use ($id) {
			return $invoice['id'] === $id;
		});
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
		return $this->invoices;
	}

	public function findReceipt($id)
	{
		return $this->receipts()->find($id);
	}

	public function receipts($parameters = [])
	{
		return $this->receipts;
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
		return $this->subscriptions()->put("$subscription.subscribers", $this->user());
	}

	/**
	 * Get all of the subscriptions.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function subscriptions()
	{
		return $this->subscriptions;
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
		return $this->subscription($subscription)->contains('subscribers', $this->user());
	}

	/**
	 * Get a subscription instance by name.
	 *
	 * @param  string $id
	 * @return object|null
	 */
	public function subscription($id = 'default')
	{
		return $this->subscriptions()->first(function (array $subscription) use ($id) {
			return $subscription['id'] === $id;
		});
	}
}
