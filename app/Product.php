<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class Product extends Model
{
	/**
	 * @inheritdoc
	 */
	protected $fillable = [
		'name',
		'reusable',
		'is_virtual',
		'type',
		'command',
		'value',
		'cost',
		'currency',
		'lifetime',
		'description',
		'published_at'
	];

	/**
	 * @inheritdoc
	 */
	protected $casts = [
		'reusable' => 'boolean',
		'is_virtual' => 'boolean',
		'cost' => 'float',
		'currency' => 'string'
	];

	/**
	 * @inheritdoc
	 */
	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('published', function ($query) {
			return $query->whereNotNull('published_at');
		});
	}

	/**
	 * Scope the unpublished products.
	 *
	 * @param Builder $query
	 * @return void
	 */
	public function scopeUnpublished($query)
	{
		$query->withoutGlobalScope('published')->whereNull('published_at');
	}

	/**
	 * Apply the product to the given model.
	 *
	 * @param Model $model
	 * @return Model
	 */
	public function apply($model)
	{
		Artisan::call($this->command, ['product' => $this->id, 'player' => $model->id]);

		return $model;
	}

	/**
	 * A product can be published.
	 *
	 * @param \DateTime $date
	 * @return $this
	 */
	public function publish($date = null)
	{
		return tap($this)->update(['published_at' => $date ?: now()]);
	}

	/**
	 * A Product can be unpublished.
	 *
	 * @return $this
	 */
	public function unpublish()
	{
		return tap($this)->update(['published_at' => null]);
	}
}
