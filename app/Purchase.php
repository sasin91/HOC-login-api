<?php

namespace App;

use App\Events\CreatedPurchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
	use SoftDeletes;

	const DELETED_AT = 'refunded_at';

	protected $fillable = [
		'purchasable_id',
		'purchasable_type',
		'buyer_id',
		'buyer_type',
		'owner_id',
		'owner_type',
		'currency',
		'amount',
		'token',
		'payment_type',
		'card_last_four',
		'completed_at',
		'refunded_at',
		'provider_id'
	];

	protected $dates = ['completed_at', 'refunded_at'];

	protected $events = [
		'created' => CreatedPurchase::class,
	];

	protected $hidden = ['token'];

	/**
	 * Get gifted purchases.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 */
	public function scopeGifts($query)
	{
		$query->whereNotNull('owner_id')
			->whereNotNull('owner_type');
	}

	/**
	 * Exclude gift purchases.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 */
	public function scopeWithoutGifts($query)
	{
		$query->withoutGlobalScope('gifts')
			->whereNull('owner_id')
			->whereNull('owner_type');
	}

	/**
	 * Get completed purchases.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 */
	public function scopeCompleted($query)
	{
		$query->whereNotNull('completed_at');
	}

	/**
	 * Get refunded purchases.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 */
	public function scopeRefunded($query)
	{
		$query->whereNotNull('refunded_at');
	}



	/**
	 * Get the purchased model.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function purchasable()
	{
		return $this->morphTo();
	}

	/**
	 * Get the buyer.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function buyer()
	{
		return $this->morphTo();
	}

	/**
	 * A Purchase have an owner, when bought as a gift.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function owner()
	{
		return $this->morphTo();
	}

	/**
	 * Apply the purchased product to the buyer or owner, if applicable.
	 *
	 * @return $this | Purchase
	 */
	public function apply()
	{
		$product = $this->purchasable;

		if (method_exists($product, 'apply')) {
			if ($this->owner) {
				$product->apply($this->owner);
			} else {
				$product->apply($this->buyer);
			}
		}

		return $this;
	}

	/**
	 * mark the current purchase as refunded.
	 *
	 * @param \DateTime | string $date
	 * @return $this
	 */
	public function refund($date = null)
	{
		return tap($this)->update(['refunded_at' => $date ?: now()]);
	}
}
