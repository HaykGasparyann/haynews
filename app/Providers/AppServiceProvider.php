<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->admin === '1';
        });
        Gate::define('writer', function (User $user) {
            return $user->writer === '1';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
        Blade::if('writer', function () {
            return request()->user()?->can('writer');
        });
    }
}
