<?php

namespace Tests;


use App\User;
use Laravel\Passport\Passport;

trait SignIn
{
	protected function seedPermissions()
	{
		$this->seed(\PermissionsTableSeeder::class);
	}

	protected function signInAsModerator($user = null)
	{
		return $this->signInWithRole('Moderator', $user);
	}

	protected function signInWithRole($role, $user = null)
	{
		return tap($this->signIn($user), function () use ($role) {
			auth()->user()->assignRole($role);
		});
	}

	protected function signIn($user = null)
	{
		Passport::actingAs($user ? $user : factory(User::class)->create());

		return $this;
	}

	protected function signInAsAdmin($user = null)
	{
		return $this->signInWithRole('Admin', $user);
	}
}