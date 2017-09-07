<?php

namespace App;


class SuperUser
{
	private static $emails = [
		'jonas.kerwin.hansen@gmail.com'
	];

	public static function add($email)
	{
		static::$emails[] = $email;
	}

	public static function has($user)
	{
		if (is_object($user)) {
			$user = $user->email;
		}

		return in_array($user, static::$emails);
	}
}