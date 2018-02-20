<?php

namespace App\Policies;

use App\Policies\Concerns\BypassedBySuperAdmins;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization, BypassedBySuperAdmins;

    /**
     * Determine whether the user can assign the role to somebody else.
     *
     * @param User $user
     * @param Role $role
     * @return bool
     */
    public function assign(User $user, $role)
    {
        if ($role->name === 'Admin') {
            return false;
        }

        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can remove the role from somebody else.
     *
     * @param User $user
     * @param Role $role
     * @return bool
     */
    public function revoke(User $user, $role)
    {
        if ($role->name === 'Admin') {
            return true;
        }

        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can view the role.
     *
     * @return boolean
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create roles');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User $user
     * @param  \Spatie\Permission\Models\Role $role
     * @return mixed
     */
    public function update(User $user, $role)
    {
        return $user->hasPermissionTo('edit roles');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User $user
     * @param  \Spatie\Permission\Models\Role $role
     * @return mixed
     */
    public function delete(User $user, $role)
    {
        return $user->hasPermissionTo('delete roles');
    }
}
