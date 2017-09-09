<?php

namespace App\Providers;

use App\Billing\Manager;
use App\Billing\PaymentGateway;
use Hashids\Hashids;
use Hashids\HashidsInterface;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laracasts\Generators\GeneratorsServiceProvider;
use Laravel\Dusk\Browser;
use Laravel\Dusk\DuskServiceProvider;
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
		Validator::extend('model', 'App\Rules\ValidModel@passes');

		Relation::morphMap([
			'user' => 'App\User',
			'player' => 'App\Player',
			'product' => 'App\Product'
		]);

		MorphTo::macro('fill', function ($attributes) {
			/** @var MorphTo $relation */
			$relation = $this;

			return $relation->getParent()->forceFill([
				$relation->getForeignKey() => array_get($attributes, $relation->getForeignKey()),
				$relation->getMorphType() => array_get($attributes, $relation->getMorphType())
			]);
		});
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
			$this->app->register(DuskServiceProvider::class);

			$this->registerTestingMacros();
		}

		$this->app->singleton(HashidsInterface::class, function ($app) {
			/** @var \Illuminate\Contracts\Config\Repository $config */
			$config = $app['config'];

			return new Hashids(
				$config->get('hashids.salt'),
				$config->get('hashids.length'),
				$config->get('hashids.alphabet')
			);
		});

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

		TestResponse::macro('assertHost', function ($domain) {
			$url = $this->headers->get('Location');
			$host = parse_url($url)['host'];

			PHPUnit::assertEquals($domain, $host);

			return $this;
		});

		Browser::macro('debug', function () {
			eval(\Psy\sh());
			return $this;
		});

		TestResponse::macro('debug', function () {
			eval(\Psy\sh());
			return $this;
		});
	}

	protected function registerPaymentGateway()
	{
		$this->app->singleton(Manager::class, function ($app) {
			return new Manager($app);
		});

		$this->app->singleton(PaymentGateway::class, function ($app) {
			return $app[Manager::class]->driver();
		});
	}
}
