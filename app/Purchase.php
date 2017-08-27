<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'purchasable_id',
		'purchasable_type',
		'buyer_id',
		'buyer_type',
		'currency',
		'amount'
	];

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
}
