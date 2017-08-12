<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment(['testing', 'development', 'local'])) {
            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Mpociot\LaravelTestFactoryHelper\TestFactoryHelperServiceProvider::class);
        }
    }
}
