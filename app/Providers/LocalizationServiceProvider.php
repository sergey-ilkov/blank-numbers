<?php

namespace App\Providers;

use App\Services\Localization\Localization;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(Localization::class, function (Application $app) {
            return new Localization();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}