<?php

namespace App\Policies;

use App\Policies\Concerns\BypassedByAdmins;
use App\Reply;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization, BypassedByAdmins;

    /**
     * Determine if the authenticated user has permission to update a reply.
     *
     * @param  User  $user
     * @param  Reply $reply
     * @return bool
     */
    public function update(User $user, Reply $reply)
    {
        return $reply->owner->is($user)
        || $user->hasRole(['Moderator']);
    }

    /**
     * Determine if the authenticated user has permission to create a new reply.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user)
    {
        if (! $lastReply = $user->fresh()->lastReply) {
            return true;
        }

        return ! $lastReply->wasJustPublished();
    }

    /**
     * Determine if the authenticated user has permission to delete a reply.
     *
     * @param  User  $user
     * @param  Reply $reply
     * @return bool
     */
    public function destroy(User $user, Reply $reply)
    {
        return $reply->owner->is($user)
        || $user->hasRole(['Moderator']);
    }
}
