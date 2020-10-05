<?php

namespace App\Providers;

use App\Models\User\Repositories\EloquentUserRepository;
use App\Models\User\UserService;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class UserServiceProvider
 * @package App\Providers
 */
class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerServices();
    }

    private function registerServices()
    {
        $this->app->singleton(EloquentUserRepository::class, function ($app) {
            return new EloquentUserRepository();
        });

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService(
                $app[EloquentUserRepository::class],
                Socialite::driver('google')
            );
        });
    }

}
