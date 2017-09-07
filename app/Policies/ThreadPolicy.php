<?php

namespace App\Policies;

use App\Policies\Concerns\BypassedByAdmins;
use App\Thread;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization, BypassedByAdmins;

    /**
     * Determine whether the user can update the thread.
     *
     * @param  \App\User   $user
     * @param  \App\Thread $thread
     * @return mixed
     */
    public function update(User $user, Thread $thread)
    {
	    return $thread->creator->is($user) && $thread->isLockedBy($user)
		    || $user->hasPermissionTo('edit threads');
    }

	/**
	 * Determine whether the user can delete the board.
	 *
	 * @param  \App\User $user
	 * @param  \App\Thread $thread
	 * @return mixed
	 */
	public function delete(User $user, Thread $thread)
	{
		return $thread->creator->is($user)
			|| $user->hasPermissionTo('delete boards');
	}
}
