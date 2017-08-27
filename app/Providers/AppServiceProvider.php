<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayManager;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laracasts\Generators\GeneratorsServiceProvider;
use Mpociot\LaravelTestFactoryHelper\TestFactoryHelperServiceProvider;
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
        Schema::defaultStringLength(191);

        Validator::extend('spamfree', 'App\Rules\SpamFree@passes');
	    Validator::extend('gateway', 'App\Rules\ValidPaymentGateway@passes');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment(['testing', 'development', 'local'])) {
	        $this->app->register(GeneratorsServiceProvider::class);
	        $this->app->register(TestFactoryHelperServiceProvider::class);

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
	        $response = $this->decodeResponseJson();

	        if (\array_key_exists('data', $response)) {
		        PHPUnit::assertCount($excepted, $response['data'],
			        "Response.data count did not match expected [{$excepted}].");
	        } else {
		        PHPUnit::assertCount($excepted, $response, "Response.data count did not match expected [{$excepted}].");
	        }

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
	    $this->app->singleton(PaymentGatewayManager::class, function ($app) {
		    return new PaymentGatewayManager($app);
	    });

	    $this->app->singleton(PaymentGateway::class, function ($app) {
		    return $app[PaymentGatewayManager::class]->driver();
	    });
    }
}
