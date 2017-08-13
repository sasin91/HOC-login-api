<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProfilesController extends Controller
{
	public function __construct()
	{
		Route::bind('user', function ($name) {
			if (! is_numeric($name)) {
				return User::where('name', $name)->firstOrFail();
			}

			return User::findOrFail($name);
		});
	}

    public function show(User $user)
    {
    	return [
    		'user' => $user,
    		'activities' => Activity::feed($user)
    	];
    }
}
