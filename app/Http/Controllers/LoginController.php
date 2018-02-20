<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function store(LoginRequest $request, Guard $guard)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        return $guard->attempt(request(['email', 'password']))
        ? $this->sendSuccessResponse($request)
        : $this->sendFailureResponse($request);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    protected function username()
    {
        return 'email';
    }

    protected function sendSuccessResponse($request)
    {
        $this->clearLoginAttempts($request);

        $token = $request->user()->createToken('auth')->accessToken;
        $request->user()->withAccessToken($token);

        return response()->json($request->user());
    }

    protected function sendFailureResponse($request)
    {
        $this->incrementLoginAttempts($request);

        return response()->json(['password' => trans('auth.failed')], 422);
    }
}
