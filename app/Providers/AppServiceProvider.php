<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        // https認証
        if (config('app.env') === 'production' || config('app.env') === 'develop') {
            \URL::forceScheme('https');
        }
        Schema::defaultStringLength(191); // 追加

        // ページネーション
        Paginator::useBootstrap();
    }
}
