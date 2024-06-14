<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Gate::policy(User::class, AdminPolicy::class);

        // ? доступ к просмотру пунктов меню
        Gate::define('superadmin', function (User $user, User $model) {
            return $model->role == 'superadmin';
        });
        Gate::define('admin', function (User $user, User $model) {
            return $model->role == 'admin';
        });

        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
