<?php

namespace App\Policies;

use App\Policies\Concerns\BypassedByAdmins;
use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
	use HandlesAuthorization, BypassedByAdmins;

	/**
	 * Determine whether the user can view the product.
	 *
	 * @param  \App\User $user
	 * @param  \App\Product $product
	 * @return mixed
	 */
	public function view()
	{
		return true;
	}

	/**
	 * Determine whether the user can create products.
	 *
	 * @param  \App\User $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		return $user->hasPermissionTo('create products');
	}

	/**
	 * Determine whether the user can update the product.
	 *
	 * @param  \App\User $user
	 * @param  \App\Product $product
	 * @return mixed
	 */
	public function update(User $user, Product $product)
	{
		return $user->hasPermissionTo('update products');
	}

	/**
	 * Determine whether the user can delete the product.
	 *
	 * @param  \App\User $user
	 * @param  \App\Product $product
	 * @return mixed
	 */
	public function delete(User $user, Product $product)
	{
		return $user->hasPermissionTo('delete products');
	}
}
