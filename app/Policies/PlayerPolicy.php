<?php

namespace App\Policies;

use App\Player;
use App\Policies\Concerns\BypassedByAdmins;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlayerPolicy
{
    use HandlesAuthorization, BypassedByAdmins;

    /**
     * Determine whether the user can view the player.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function view(User $user, Player $player)
    {
        return $player->user->is($user)
        || $user->hasRole(['Moderator'])
        || $user->isFriendWith($player->user)
        || $user->servers->contains($player->server);
    }

    /**
     * Determine whether the user can create players.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->exists;
    }

    /**
     * Determine whether the user can update the player.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function update(User $user, Player $player)
    {
        return $player->user->is($user);
    }

    /**
     * Determine whether the user can delete the player.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function delete(User $user, Player $player)
    {
        return $player->user->is($user);
    }
}
