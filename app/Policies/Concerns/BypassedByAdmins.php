<?php

namespace App\Policies\Concerns;

use App\SuperUser;

trait BypassedByAdmins
{
    public function before($user, $ability)
    {
        if (SuperUser::has($user) || $user->hasRole('Admin')) {
            return true;
        }

        return null;
    }
}
