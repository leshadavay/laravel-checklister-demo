<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //enable to use bootstrap pagination styles
        Paginator::useBootstrap();

        //enable use view composer in 'sidebar'
        View::composer('layouts.sidebar',MenuComposer::class);
    }
}
