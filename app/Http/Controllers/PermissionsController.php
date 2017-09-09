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
		$this->validate($request, ['name' => 'required|string|unique:permissions,name']);

		return Permission::create(request()->intersect('name'));
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
		$this->validate($request, ['name' => 'string|unique:permissions,name']);

		return tap($permission)->update($request->intersect('name'));
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
