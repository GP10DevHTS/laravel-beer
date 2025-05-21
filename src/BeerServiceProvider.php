<?php

namespace Gp10devhts\LaravelBeer;

use Illuminate\Support\ServiceProvider;
use Gp10devhts\LaravelBeer\BeerService; // Import BeerService
use Gp10devhts\LaravelBeer\Commands;

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
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\ServeBeerCommand::class,
                Commands\CheersCommand::class,    // New command
                Commands\WisdomCommand::class,     // New
                Commands\HappyHourCommand::class,  // New
                Commands\EmptyKegCommand::class,   // New
                Commands\OpenProjectCommand::class,   // New
                Commands\BeerTestCommand::class,   // New
                Commands\BrewCommand::class,         // New
            ]);
        }
    }
}
