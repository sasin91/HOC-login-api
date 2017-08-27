<?php

namespace App;

trait HasPurchases
{
	/**
	 * Make a Purchase for given model.
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function purchase($model)
	{
		return $this->purchases()->make([
			'purchasable_type' => get_class($model),
			'purchasable_id' => $model->getKey(),
		]);
	}

	/**
	 * The owners purchases.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function purchases()
	{
		return $this->morphMany(Purchase::class, 'buyer');
	}
}