<?php

namespace App\Services;

use Carbon\Carbon;

class AuthService
{
    public static function login($user, $rememberMe = false)
    {

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($rememberMe) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return [
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
        ];
    }

    public static function logout($user)
    {
        return $user->token()->revoke();
    }
}
