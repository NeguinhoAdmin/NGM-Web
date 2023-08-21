<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('SuperAdmin-only', function ($user) {
        //     return ($user->is_admin === 777);
        // });

        // Gate::define('Manager-only', function ($user) {
        //     if (count($user->roles) > 0) {
        //         return ($user->roles->first()->name === 'Manager');
        //     }
        // });

        // Gate::define('Staff-only', function ($user) {
        //     if (count($user->roles) > 0) {
        //         return ($user->roles->first()->name === 'Staff');
        //     }
        // });

        // Gate::define('Customer-only', function ($user) {
        //     if (count($user->roles) > 0) {
        //         return ($user->roles->first()->name === 'Customer');
        //     }
        // });
    }
}
