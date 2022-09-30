<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        $blade = $this->app->make('view')
            ->getEngineResolver()
            ->resolve('blade')
            ->getCompiler();

        $blade->if('role', static function ($role) {
            return Auth::check() && Auth::user()->hasRole($role);
        });
    }
}
