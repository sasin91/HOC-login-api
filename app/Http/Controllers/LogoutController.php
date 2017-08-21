<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogoutRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(Guard $guard, LogoutRequest $request)
    {
        $guard->logout();

        return response('Thank you, come again!', 200);
    }
}
