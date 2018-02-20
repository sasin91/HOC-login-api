<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class UserRolesController extends Controller
{
    use HandleRoles;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request, User $user)
    {
        $request->validate($this->rules());

        $roles = $this->roles($request)->each(function ($role) {
            return $this->authorize('assign', $role);
        });

        return $user->assignRole($roles);
    }

    public function destroy(Request $request, User $user)
    {
        $request->validate($this->rules());

        foreach ($this->roles($request) as $role) {
            dd(\Illuminate\Support\Facades\Gate::denies('revoke', $role));

            if (\Illuminate\Support\Facades\Gate::denies('revoke', $role)) {
                return abort(401);
            }

            $user->removeRole($role);
        }
    }
}
