<?php

namespace App\Google;

use BGDS\Utils\Util;
use Google_Client;
use Illuminate\Support\Facades\Cookie;

/**
 * Class GoogleOAuth2
 * @package App\Google
 */
class GoogleOAuth2
{
    /**
     * @var Google_Client
     */
    private $client;

    /**
     * GoogleOAuth2 constructor.
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return bool
     */
    public function isAccessTokenExpired()
    {
        $token = Cookie::get(Util::TOKEN);
        $expiresIn = Cookie::get(Util::TOKEN_EXPIRE);
        $this->client->setAccessToken(['access_token' => $token, 'expires_in' => $expiresIn]);

        return $this->client->isAccessTokenExpired();
    }

    /**
     * @return array
     */
    public function fetchAccessTokenWithRefreshToken()
    {
        $refreshToken = Cookie::get(Util::REFRESH_TOKEN);

        return $this->client->fetchAccessTokenWithRefreshToken($refreshToken);
    }
}
