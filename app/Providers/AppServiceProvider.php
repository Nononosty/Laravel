<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Copy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-copy', function(User $user, Copy $copy){
            return $user->is_admin OR $copy->wear_coefficient < 0.1;    
        });

        Gate::define('edit-copy', function(User $user, Copy $copy){
            return $user->is_admin OR $copy->wear_coefficient < 0.1;
        });

        Gate::define('lend-copy', function (User $user) {
            return $user->is_admin;
        });
        
        Gate::define('add-copy', function(User $user) {
            return $user->is_admin;
        });
    }
    
}
