<?php

namespace App\Http\Controllers\Me;

use App\EmailVerification;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function show(Request $request)
    {
        $user = User::where('verification_token', $request->token)->firstOrFail();

        $this->validateToken($request->token, $user);

        return response()->json([], 200);
    }

    /**
     * Validate the verification token
     *
     * @param string $token
     * @param User $user
     */
    protected function validateToken($token, $user)
    {
        $valid = EmailVerification::check($token, $user);

        throw_unless($valid, \InvalidArgumentException::class, "Invalid verification token.");

        $user->update(['verified_at' => now()]);
    }
}
