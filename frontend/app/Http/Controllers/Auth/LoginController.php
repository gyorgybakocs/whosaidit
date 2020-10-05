<?php

namespace App\Http\Controllers\Auth;

use App\Cookie\CookieService;
use App\Http\Controllers\BaseController;
use App\Models\User\UserService;
use BGDS\Utils\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends BaseController
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        $parameters = ['access_type' => 'offline', "prompt" => "consent select_account"];

        return Socialite::driver('google')
            ->with($parameters)
            ->redirect();
    }

    /**
     * @param Request $request
     * @param UserService $userService
     * @param CookieService $cookie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleCallback(Request $request, UserService $userService, CookieService $cookie)
    {
        try {
            $userData = Socialite::driver('google')->user();
            $userData->setExpiresIn(env('TOKEN_EXPIRES', 90));

            $cookie->setTokenCookies($userData);
            
            $userService->upsert([
                'name' => $userData->name,
                'email' => $userData->email,
                'profile_image' => $userData->avatar,
                'open_id' => $userData->id,
                'refresh_token' => $userData->refreshToken,
            ]);


            return Redirect::to(Util::getUrl($request->url()));

        } catch (\Exception $e) {
            $cookie->resetTokenCookies();

            return Redirect::to('loginerror');
        }
    }

    /**
     * @param CookieService $cookie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logOut(CookieService $cookie)
    {
        $cookie->resetTokenCookies();

        return Redirect::to(Util::getUrl(URL::previous(), true));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function error()
    {
        $this->logger->info('Login error', []);

        return view('pages.loginerror');
    }
}