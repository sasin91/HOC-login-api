<?php

namespace App;

use App\Notifications\EmailVerification as EmailVerificationNotification;

class EmailVerification
{
    public static function notify($user)
    {
        return $user->notify(new EmailVerificationNotification($user->verification_token));
    }

    public static function token()
    {
        return str_random();
    }

    public static function check($token, $user = null)
    {
        $user = $user ?: auth()->user();

        return $user->verification_token === $token;
    }
}
