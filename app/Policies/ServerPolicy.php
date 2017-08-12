<?php

namespace App\Policies;

use App\User;
use App\Server;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the server.
     *
     * @param  \App\User  $user
     * @param  \App\Server  $server
     * @return mixed
     */
    public function view($user = null, $server = null)
    {
        return true;
    }

    /**
     * Determine whether the user can create servers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create servers');
    }

    /**
     * Determine whether the user can update the server.
     *
     * @param  \App\User  $user
     * @param  \App\Server  $server
     * @return mixed
     */
    public function update(User $user, Server $server)
    {
        return $user->hasPermissionTo('edit servers');
    }

    /**
     * Determine whether the user can delete the server.
     *
     * @param  \App\User  $user
     * @param  \App\Server  $server
     * @return mixed
     */
    public function delete(User $user, Server $server)
    {
        return $user->hasPermissionTo('delete servers');
    }
}
