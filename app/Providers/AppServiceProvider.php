<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayManager;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
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

        $this->registerPaymentGateway();
    }

    protected function registerTestingMacros()
    {
        Collection::macro('assertContains', function ($item) {
            PHPUnit::assertTrue($this->contains($item), "Collection did not contain given item.");
        });

        TestResponse::macro('assertCount', function ($excepted) {
            PHPUnit::assertCount($excepted, $this->decodeResponseJson(), "Response.data count did not match expected [{$excepted}].");

            return $this;
        });

        TestResponse::macro('assertValidationErrors', function ($field) {
            $this->assertStatus(422);
            PHPUnit::assertArrayHasKey($field, $this->decodeResponseJson(), "Response did not contain given field : [{$field}].");

            return $this;
        });
    }

    protected function registerPaymentGateway()
    {
        $this->app->singleton(PaymentGateway::class, PaymentGatewayManager::class);
    }
}
