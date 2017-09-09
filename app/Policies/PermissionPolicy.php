<?php

namespace App\Policies;

use App\Policies\Concerns\BypassedBySuperAdmins;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionPolicy
{
	use HandlesAuthorization, BypassedBySuperAdmins;

	/**
	 * Determine whether the user can assign the permission to somebody else.
	 *
	 * @param User $user
	 * @param Permission $permission
	 * @return bool
	 */
	public function grant(User $user, $permission)
	{
		if (Role::findByName('Admin')->permissions->contains($permission)) {
			return false;
		}

		return $user->hasPermissionTo('grant permissions');
	}

	/**
	 * Determine whether the user can remove the permission from somebody else.
	 *
	 * @param User $user
	 * @param Permission $permission
	 * @return bool
	 */
	public function revoke(User $user, $permission)
	{
		if (Role::findByName('Admin')->permissions->contains($permission)) {
			return false;
		}

		return $user->hasPermissionTo('revoke permissions');
	}

	/**
	 * Determine whether the user can view the permission.
	 *
	 * @param  \App\User $user
	 * @param  \Spatie\Permission\Models\Permission $permission
	 * @return mixed
	 */
	public function view(User $user, $permission)
	{
		return true;
	}

	/**
	 * Determine whether the user can create permissions.
	 *
	 * @param  \App\User $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		return $user->hasPermissionTo('create permissions');
	}

	/**
	 * Determine whether the user can update the permission.
	 *
	 * @param  \App\User $user
	 * @param  \Spatie\Permission\Models\Permission $permission
	 * @return mixed
	 */
	public function update(User $user, $permission)
	{
		return $user->hasPermissionTo('edit permissions');
	}

	/**
	 * Determine whether the user can delete the permission.
	 *
	 * @param  \App\User $user
	 * @param  \Spatie\Permission\Models\Permission $permission
	 * @return mixed
	 */
	public function delete(User $user, $permission)
	{
		return $user->hasPermissionTo('delete permissions');
	}
}
