<?php

namespace App\Policies;

use App\Policies\Concerns\BypassedByAdmins;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChannelPolicy
{
    use HandlesAuthorization, BypassedByAdmins;

    public function create($user)
    {
        return true;
    }

    public function view($user, $channel)
    {
        return true;
    }

    public function update($user, $channel)
    {
        return $channel->creator->is($user);
    }

    public function destroy($user, $channel)
    {
        return $channel->creator->is($user);
    }
}
