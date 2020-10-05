<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class CookieServiceProvider
 * @package App\Providers
 */
class CookieServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerServices();
    }

    private function registerServices()
    {
        $this->app->singleton(CookieService::class, function ($app) {
            return new CookieService();
        });
    }

}
