<?php

namespace App\Policies\Concerns;

trait BypassedByRoles
{
	protected $roles = [];

	public function before($user, $ability)
	{
		if ($user->hasRole($this->roles)) {
			return true;
		}

		return null;
	}
}