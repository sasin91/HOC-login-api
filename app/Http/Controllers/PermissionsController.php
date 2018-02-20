<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');

        $this->authorizeResource(Permission::class);
    }

    /**
     * Display available permissions
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return Permission::paginate(
            request('perPage'),
            request('columns'),
            request('pageName'),
            request('page')
        );
    }

    /**
     * Create a new Permission.
     *
     * @param Request $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        $input = $request->validate(['name' => 'required|string|unique:permissions,name']);

        return Permission::create($input);
    }

    /**
     * Display a permission.
     *
     * @param Permission $permission
     * @return Permission
     */
    public function show(Permission $permission)
    {
        return $permission;
    }

    /**
     * Update a Permission with request parameters.
     *
     * @param Request $request
     * @param Permission $permission
     * @return Permission
     */
    public function update(Request $request, Permission $permission)
    {
        $input = $request->validate(['name' => 'string|unique:permissions,name']);

        return tap($permission)->update($input);
    }

    /**
     * Delete a permission.
     *
     * @param Permission $permission
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
    }
}
