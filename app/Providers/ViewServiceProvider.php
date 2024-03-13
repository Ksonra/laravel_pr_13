<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        View::composer(['catalog','products'], 'App\Providers\ViewComposers\ProductsComposer');
       }
}
