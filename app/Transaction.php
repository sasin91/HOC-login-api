<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
		'user_id',
		'purchase_id',
		'gateway',
		'provider_id',
		'currency',
		'amount',
		'payment_type',
		'card_last_four',
		'refunded_at',
		'refunded_amount'
	];

	protected $dates = ['refunded_at'];

	protected $casts = [
		'amount' => 'float',
		'refunded_amount' => 'float'
	];

	protected $appends = ['formatted_amount'];

	/**
	 * A Transaction displays the amount in money.
	 * ie. $500,00.
	 *
	 * @return string
	 */
	public function getFormattedAmountAttribute()
	{
		return money_format('%n', $this->amount);
	}

	/**
	 * A Transaction belongs to a purchase.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function purchase()
	{
		return $this->belongsTo(Purchase::class);
	}

	/**
	 * Refund a transaction.
	 *
	 * @param null|int $amount
	 * @param null|\DateTime $date
	 * @return Transaction
	 */
	public function refund($amount = null, $date = null)
	{
		return tap($this)->update([
			'refunded_amount' => $amount ?: $this->amount,
			'refunded_at' => $date ?: now()
		]);
	}
}
