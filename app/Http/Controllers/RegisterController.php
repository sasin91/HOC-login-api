<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class RegisterController extends Controller
{
    public function store(Guard $guard)
    {
    	$this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
    	]);

    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    	]);

    	Event::fire(new Registered($user));

    	$guard->login($user);

    	$token = $user->createToken('auth')->accessToken;
        $user->withAccessToken($token);

    	return response()->json($user);
    }
}
