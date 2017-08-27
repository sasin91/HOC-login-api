<?php

namespace App\Billing;

interface PaymentGateway
{
    /**
     * Whether the gateway requires a token to process the payment.
     *
     * @return boolean
     */
    public function requiresToken();

    /**
     * The payment provider ID.
     *
     * @return string
     */
    public function providerId();

    /**
     * Get the total amount of charges
     *
     * @return integer
     */
    public function totalCharges();

    /**
     * Get the total amount of refunds
     *
     * @return integer
     */
    public function totalRefunds();

    /**
     * Make a "one off" charge on the customer for the given amount.
     *
     * @param  int  $amount
     * @param  array  $options
     *
     * @return \App\Transaction
     *
     * @throws \Exception
     */
    public function charge($amount, array $options = []);

    /**
     * Refund a customer for a charge.
     *
     * @param  string      $id
     * @param  int|null    $amount
     *
     * @return \App\Transaction
     *
     * @throws \Exception
     */
	public function refund($id, $amount = null);

    /**
     * Get a collection of the entity's invoices.
     *
     * @param  bool  $includePending
     * @param  array  $parameters
     * @return \Illuminate\Support\Collection
     */
    public function invoices($includePending = false, $parameters = []);

    /**
     * Find an invoice by ID.
     *
     * @param  string $id
     *
     * @return \App\Transaction|null
     */
    public function findInvoice($id);

    /**
     * Get all of the subscriptions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function subscriptions();

    /**
     * Get a subscription instance by name.
     *
     * @param  string $subscription
     *
     * @return \App\Transaction|null
     */
    public function subscription($subscription = 'default');

    /**
     * Begin creating a new subscription.
     *
     * @param  string      $subscription
     * @param  string|null $plan
     *
     * @return \App\Transaction
     */
    public function subscribeTo($subscription, $plan = null);

    /**
     * Determine if there is a given subscription.
     *
     * @param  string      $subscription
     * @param  string|null $plan
     *
     * @return bool
     */
    public function subscribed($subscription = 'default', $plan = null);
}
