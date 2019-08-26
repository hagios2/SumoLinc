<?php

namespace App\Providers;

use App\Connections;
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
        view()->composer('layouts.app', function($view){

            $view->with('connectionRequests', Connections::where([['following_id', auth()->id()], ['confirmedConnection', '0']]));
        });

    }
}
