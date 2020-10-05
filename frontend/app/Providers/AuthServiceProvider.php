<?php

namespace App\Providers;

use App\Google\GoogleOAuth2;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider
 * @package App\Providers
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }

    public function register()
    {
        $this->registerServices();
    }

    public function registerServices()
    {
        $this->app->singleton(GoogleOAuth2::class, function ($app) {
            $googleClient = new \Google_Client();

            $googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
            $googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
            $googleClient->setPrompt('consent');
            $redirectUrl = 'http://'
                . $app['request']->server('HTTP_HOST')
                . env('GOOGLE_CLIENT_CALLBACK');
            $googleClient->setRedirectUri($redirectUrl);

            return new GoogleOAuth2(
                $googleClient
            );
        });
    }
}

