<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RolePermissionsController extends Controller
{
    use HandlePermissions;

    public function __construct()
    {
        $this->middleware(['auth:api', 'role:Admin']);
    }

    /**
     * List the permissions of the current role.
     *
     * @param Role $role
     * @return Collection
     */
    public function index(Role $role)
    {
        return $role->permissions;
    }

    /**
     * Attach some new permissions to a role.
     *
     * @param Role $role
     * @param Request $request
     * @return Collection
     */
    public function store(Role $role, Request $request)
    {
        $this->validate($request, $this->rules());

        $role->permissions()->attach(
            $this->permissions($request)
        );

        return $role->permissions;
    }

    /**
     * Detach some permissions from given role.
     *
     * @param  Role $role
     * @return Collection
     */
    public function destroy(Role $role)
    {
        $this->validate(request(), $this->rules());

        $role->permissions()->detach(
            $this->permissions(request())
        );
    }
}
