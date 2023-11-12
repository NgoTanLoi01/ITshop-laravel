<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('category-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-category'));
        });

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });
        Gate::define('product-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-product'));
        });

        Gate::define('slider-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-slider'));
        });
        Gate::define('setting-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-setting'));
        });

        Gate::define('user-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-user'));
        });
        Gate::define('role-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-role'));
        });
    }
}
