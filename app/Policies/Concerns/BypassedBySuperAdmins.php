<?php

namespace App\Policies\Concerns;


use App\SuperUser;

trait BypassedBySuperAdmins
{
	public function before($user, $ability)
	{
		if (SuperUser::has($user)) {
			return true;
		}

		return null;
	}
}