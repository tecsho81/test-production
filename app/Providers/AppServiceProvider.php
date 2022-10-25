<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        //
        // if(\App::enviroment(['production']) || \App::enviroment(['develop'])){
        //     \URL::forceScheme('https');
        // }
        if(config('app.env')==='production' || config('app.env')==='develop'){
            \URL::forceScheme('https');
        }
    }
}
