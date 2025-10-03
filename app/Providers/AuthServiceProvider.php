<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    /*public function boot(): void
    {
        //
    }*/

    public function boot(): void
    {
        //$this->registerPolicies();
        Paginator::defaultView('pagination::bootstrap-4');

        /*Gate::define('destroy-copy', function (User $user, Copy $copy){ //без Item
            return $user->is_admin OR $copy->wear_coefficient < 1;
        });*/

        Gate::define('create-edition', function(User $user){
            return true;
        });
    }
}
