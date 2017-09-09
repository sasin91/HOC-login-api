<?php

namespace App\Http\Controllers;

use App\User;

class UserRolesController extends Controller
{
	use HandleRoles;

	public function __construct()
	{
		$this->middleware('auth:api');
	}

	public function store(User $user)
	{
		$this->validate(request(), $this->rules());

		$roles = $this->roles(request())->each(function ($role) {
			$this->authorize('assign', $role);
		});

		return $user->assignRole($roles);
	}

	public function destroy(User $user)
	{
		$this->validate(request(), $this->rules());

		$this->roles(request())->each(function ($role) use ($user) {
			$this->authorize('revoke', $role);

			$user->removeRole($role);
		});
	}
}
