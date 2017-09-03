<?php

namespace App;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;

/**
 * Trait HasPurchases
 * @package App
 *
 * @property DatabaseCollection $purchases
 * @property DatabaseCollection $players
 */
trait HasPurchases
{
	public function hasPurchased($model)
	{
		if ($model->is_virtual) {
			return $this->hasPurchasedForPlayer($model);
		}

		return $this->purchases
				->where('purchasable_id', $model->getKey())
				->where('purchasable_type', get_class($model))
				->count() > 0;
	}

	public function hasPurchasedForPlayer($model)
	{
		return (bool)$this->players->first(function ($player) use ($model) {
			return $player->hasPurchased($model);
		});
	}

	/**
	 * Make a Purchase for given model.
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 * @param \Illuminate\Database\Eloquent\Model $owner
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function purchase($model, $owner = null)
	{
		$purchase = $this->purchases()->make([
			'purchasable_type' => get_class($model),
			'purchasable_id' => $model->getKey(),
			'currency' => $model->currency ?: config('payment.currency'),
			'amount' => $model->cost ?: 0
		]);

		if ($owner) {
			$purchase->owner()->associate($owner);
		}

		return tap($purchase)->saveOrFail();
	}

	/**
	 * The owners purchases.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function purchases()
	{
		return $this->morphMany(Purchase::class, 'buyer')
			->orWhere([
				'owner_type' => static::class,
				'owner_id' => $this->getKey()
			])
			->completed();
	}
}