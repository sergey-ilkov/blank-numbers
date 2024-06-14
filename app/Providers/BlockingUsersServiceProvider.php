<?php

namespace App\Providers;

use App\Services\BlockingUsers\BlockingUsers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class BlockingUsersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(BlockingUsers::class, function (Application $app) {
            return new BlockingUsers();
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