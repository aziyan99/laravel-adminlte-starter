<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        // Custom blade directive
        Blade::if('permission', function (string $permissionName) {

            // superadmin
            if (auth()->user()->email == config('starter.super_admin_email')) {
                return true;
            }

            // naive approach
            $roles = auth()->user()->roles;
            $permissions = [];
            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissions[] = $permission->name;
                }
            }

            $permissions = array_unique($permissions);

            return in_array($permissionName, $permissions);
        });

        // Show only on dev
        Blade::if('onlydev', function () {
            $possibleEnvs = ['local', 'dev', 'development']; // TODO: Move to starter.php
            return in_array(config('app.env'), $possibleEnvs);
        });
    }
}
