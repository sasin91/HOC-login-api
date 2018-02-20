<?php

namespace App\Http\Controllers;

use App\User;

class UserPermissionsController extends Controller
{
    use HandlePermissions;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(User $user)
    {
        $this->validate(request(), $this->rules());

        $permissions = $this->permissions(request())->each(function ($permission) {
            $this->authorize('grant', $permission);
        });

        return $user->givePermissionTo($permissions);
    }

    public function destroy(User $user)
    {
        $this->validate(request(), $this->rules());

        $this->permissions(request())->each(function ($permission) use ($user) {
            $this->authorize('revoke', $permission);

            $user->revokePermissionTo($permission);
        });
    }
}
