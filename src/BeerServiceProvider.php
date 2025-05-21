<?php

namespace Gp10devhts\LaravelBeer;

use Illuminate\Support\ServiceProvider;
use Gp10devhts\LaravelBeer\BeerService; // Import BeerService

class BeerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BeerService::class, function ($app) {
            return new BeerService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
