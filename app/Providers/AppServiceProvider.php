<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Testing\TestResponse;
use PHPUnit\Framework\Assert as PHPUnit;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('spamfree', 'App\Rules\SpamFree@passes');
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

        if ($this->app->environment('testing')) {
            $this->registerTestingMacros();
        }
    }

    protected function registerTestingMacros()
    {
        TestResponse::macro('assertCount', function ($excepted) {
            PHPUnit::assertCount($excepted, $this->decodeResponseJson());

            return $this;
        });

        TestResponse::macro('assertValidationErrors', function ($field) {
            $this->assertStatus(422);
            PHPUnit::assertArrayHasKey($field, $this->decodeResponseJson());

            return $this;
        });
    }
}
