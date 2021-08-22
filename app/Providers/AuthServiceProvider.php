<?php

namespace App\Providers;

use App\Collections\Constants;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('super-admin', function () {
            return Auth()->user()->role_id === Constants::ROLES["SUPER-ADMIN"];
        });

        Gate::define('admin', function () {
            return in_array(Auth()->user()->role_id, Constants::ROLES_ARRAY["ADMIN"]);
        });

        Gate::define('user', function () {
            return in_array(Auth()->user()->role_id, Constants::ROLES_ARRAY["USER"]);
        });

        Gate::define('patient', function () {
            return Auth()->user()->role_id === Constants::ROLES_ARRAY["PATIENT"];
        });

        //
    }
}
