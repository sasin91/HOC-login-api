<?php

namespace App\Policies;

use App\Policies\Concerns\BypassedByAdmins;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization, BypassedByAdmins;

    /**
     * Determine whether the user can update the given profile.
     *
     * @param  \App\User $signedInUser
     * @param  \App\User $user
     * @return boolean
     */
    public function update(User $signedInUser, User $user)
    {
        return $signedInUser->id === $user->id;
    }
}
