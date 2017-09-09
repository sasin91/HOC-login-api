<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api');

		$this->authorizeResource(Role::class);
	}

	/**
	 * Display the available roles
	 *
	 * @param \Spatie\Permission\Models\Role|Role $role
	 * @return \Illuminate\Support\Collection
	 */
	public function index(Role $role)
	{
		return $role->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Spatie\Permission\Contracts\Role|\Spatie\Permission\Models\Role $role
	 * @return \Illuminate\Http\Response
	 */
	public function show(Role $role)
	{
		return $role->load('permissions');
	}

	/**
	 * Create a new role
	 *
	 * @param Request $request
	 * @param \Spatie\Permission\Models\Role|Role $role
	 * @return \Spatie\Permission\Models\Role
	 */
	public function store(CreateRoleRequest $request, Role $role)
	{
		return tap($role->create($request->intersect(['name'])), function (Role $role) use ($request) {
			if ($request->has('permissions')) {
				$permissions = collect($request->permissions)->map(function ($permission) {
					if (is_numeric($permission)) {
						return Permission::find($permission, ['id']);
					}

					return Permission::findByName($permission);
				});

				$role->permissions()->saveMany($permissions);
			}
		});
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Spatie\Permission\Contracts\Role $role
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Role $role)
	{
		$this->validate($request, [
			'name' => 'string|unique:roles,name'
		]);

		return tap($role)->update(['name' => $request->name]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \Spatie\Permission\Contracts\Role $role
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role)
	{
		$role->delete();
	}
}
