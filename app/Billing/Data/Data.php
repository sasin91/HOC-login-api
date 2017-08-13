<?php

namespace App\Billing\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Fluent;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;

/**
 * Class Data
 *
 * @package \App\Billing
 */
class Data extends Fluent
{
    use Macroable;

	/**
	 * @var string
	 */
	static $delimiter = '.';

	/**
	 * @param callable | null $callback
	 *
	 * @return \App\Billing\Data\Data | \Illuminate\Support\HigherOrderTapProxy
	 */
	public function tap($callback = null)
	{
		return tap($this, $callback);
	}

	/**
	 * @param array $attributes
	 *
	 * @return static
	 */
	public static function make(array $attributes = [])
	{
		return new static($attributes);
	}

	/**
	 * Fill the Data attributes.
	 *
	 * @param array $attributes
	 *
	 * @return \App\Billing\Data\Data
	 */
	public function fill(array $attributes)
    {
	    $this->attributes = $attributes;

	    return $this;
    }

	/**
	 * Get an attribute from the container.
	 *
	 * @param  string $key
	 * @param  mixed  $default
	 *
	 * @return mixed
	 */
	public function get($key, $default = null)
	{
		if (Str::contains($key, static::$delimiter)) {
			return $this->getNested($key, $default);
		}

		return $this->parse(parent::get($key, $default));
	}

	/**
	 * Get a nested attribute from the container.
	 *
	 * @param  string $key
	 * @param  mixed  $default
	 *
	 * @return mixed
	 */
	public function getNested($key, $default = null)
	{
		return $this->parse(Arr::get($this->attributes, $key, $default));
	}

	/**
	 * Parse the given items.
	 *
	 * @param $items
	 *
	 * @return \Illuminate\Support\Collection|string
	 */
	protected function parse($items)
	{
		return (is_array($items) || $items instanceof Arrayable)
			? collect($items)
			: (string)$items;
    }
}
