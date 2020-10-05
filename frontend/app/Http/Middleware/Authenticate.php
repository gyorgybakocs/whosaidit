<?php

namespace App\Http\Middleware;

use App\Cookie\CookieService;
use App\Google\GoogleOAuth2;
use BGDS\Utils\Util;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Monolog\Logger;

/**
 * Class Authenticate
 * @package App\Http\Middleware
 */
class Authenticate
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var GoogleOAuth2
     */
    private $google;

    /**
     * @var CookieService
     */
    private $cookie;

    /**
     * Authenticate constructor.
     * @param Logger $logger
     * @param GoogleOAuth2 $google
     * @param CookieService $cookie
     */
    public function __construct(Logger $logger, GoogleOAuth2 $google, CookieService $cookie)
    {
        $this->logger = $logger;
        $this->google = $google;
        $this->cookie = $cookie;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->cookie(Util::TOKEN);

        if (!empty($token) && $this->google->isAccessTokenExpired()) {
            $this->cookie->resetTokenCookies(true);
            $userData = $this->google->fetchAccessTokenWithRefreshToken();
            if (!empty($userData['error'])) {
                $this->cookie->resetTokenCookies();
                return Redirect::to('login');
            }
            $this->cookie->updateTokenCookies($userData);
        }
        return $next($request);
    }
}
