<?php

namespace App\Policies\Concerns;

trait BypassedByAdmins
{
	public function before($user, $ability)
	{
		if ($user->hasRole('Admin')) {
			return true;
		}

		return false;
	}
}