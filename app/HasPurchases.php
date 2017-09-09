<?php

namespace App;

use Illuminate\Database\Eloquent\Collection as DatabaseCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * Trait HasPurchases
 * @package App
 *
 * @property DatabaseCollection $purchases
 * @property DatabaseCollection $players
 */
trait HasPurchases
{
	/**
	 * Determine if the user has purchased model.
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 * @return bool
	 */
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

	/**
	 * Determine if the user has purchased model for a player they have created.
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 * @return bool
	 */
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
	 * @return Purchase
	 */
	public function purchase($model, $owner = null)
	{
		return tap($this->purchases()->create([
			'purchasable_type' => get_class($model),
			'purchasable_id' => $model->getKey(),
			'currency' => $model->currency ?: config('payment.currency'),
			'amount' => $model->cost ?: 0,
		]), function (Purchase $purchase) use ($owner) {
			if ($owner) {
				if (is_array($owner)) {
					$purchase->owner()->fill($owner); // @see: AppServiceProvider@boot
				} else {
					$purchase->owner()->associate($owner);
				}

				$purchase->saveOrFail();

				if (is_object($owner)) {
					$owner->setRelation('gifts', $owner->gifts->push($purchase));
				}
			}
		});
	}

	/**
	 * Gift a purchase or purchase given model as a gift for owner.
	 *
	 * @param Purchase | Model $model
	 * @param Model $owner
	 * @return Model
	 */
	public function gift($model, $owner)
	{
		if ($model instanceof Purchase) {
			return tap($model, function ($purchase) use ($owner) {
				if (is_array($owner)) {
					$purchase->owner()->fill($owner);
				} else {
					$purchase->owner()->associate($owner);
				}

				$purchase->saveOrFail();
				$owner->setRelation('gifts', $owner->gifts->push($purchase));
			});
		}

		return $this->purchase($model, $owner);
	}

	/**
	 * The users purchases.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function purchases()
	{
		return $this->morphMany(Purchase::class, 'buyer');
	}

	/**
	 * The users gifts.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function gifts()
	{
		return $this->morphMany(Purchase::class, 'owner');
	}
}