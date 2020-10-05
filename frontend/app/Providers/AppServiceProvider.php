<?php

namespace App\Providers;

use App\View\Components\BreadCrumb;
use App\View\Components\Head;
use App\View\Components\Menu;
use DateTimeZone;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerSharedViewVariables();
        $this->setSiteLang();
        $this->registerBladeComponents();
    }

    public function register()
    {
        $this->registerServices();
    }

    private function registerServices()
    {

    }

    private function registerBladeComponents()
    {
        Blade::component('head', Head::class);
        Blade::component('menu', Menu::class);
        Blade::component('breadcrumb', BreadCrumb::class);
    }

    private function setSiteLang()
    {
        Cookie::queue('cc', strtoupper(env('CC', 'en')));
        date_default_timezone_set((new DateTimeZone('Europe/Budapest'))->getName());
        app()->setLocale(env('CC', 'EN'));
        setlocale(LC_ALL, env('CC', 'EN'));
    }

    private function registerSharedViewVariables()
    {
        view()->share(
            'FACEBOOK_PIXEL_ID',
            env('FACEBOOK_PIXEL_HU')
        );

        view()->share(
            'FACEBOOK_URL',
            env('FACEBOOK_HU')
        );

        view()->share(
            'APP_NAME',
            env('APP_NAME')
        );
    }
}
