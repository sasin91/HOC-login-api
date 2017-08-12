<?php

namespace App\Policies;

use App\User;
use App\Player;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlayerPolicy
{
    use HandlesAuthorization;

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
        || $user->hasRole(['Moderator', 'Admin'])
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
        return $player->user->is($user)
        || $user->hasRole(['Admin']);
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
        return $player->user->is($user)
        || $user->hasRole(['Admin']);
    }
}
