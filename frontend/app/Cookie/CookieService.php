<?php

namespace App\Cookie;

use BGDS\Utils\Util;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Contracts\User;
use Illuminate\Support\Carbon;

/**
 * Class CookieService
 * @package App\Cookie
 */
class CookieService
{
    /**
     * @param User $userData
     */
    public function setTokenCookies(User $userData)
    {
        Cookie::queue(Util::TOKEN, $userData->token);
        Cookie::queue(Util::TOKEN_EXPIRE, Carbon::now()->addSeconds(env('TOKEN_EXPIRES', 90))->timestamp);
        Cookie::queue(Util::REFRESH_TOKEN, $userData->refreshToken);
        Cookie::queue(Util::EMAIL, $userData->email);
    }

    /**
     * @param array $userData
     */
    public function updateTokenCookies(array $userData)
    {
        Cookie::queue(Cookie::forget(Util::TOKEN));
        Cookie::queue(Cookie::forget(Util::TOKEN_EXPIRE));

        Cookie::queue(Util::TOKEN, $userData['access_token']);
        Cookie::queue(Util::TOKEN_EXPIRE, Carbon::now()->addSeconds(env('TOKEN_EXPIRES', 90))->timestamp);
    }

    /**
     * @param bool $partial
     */
    public function resetTokenCookies(bool $partial = false)
    {
        Cookie::queue(Cookie::forget(Util::TOKEN));
        Cookie::queue(Cookie::forget(Util::TOKEN_EXPIRE));
        if (!$partial) {
            Cookie::queue(Cookie::forget(Util::REFRESH_TOKEN));
            Cookie::queue(Cookie::forget(Util::EMAIL));
        }
    }
}
