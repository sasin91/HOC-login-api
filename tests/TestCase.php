<?php

namespace Tests;
include 'helpers.php';

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication, SignIn;

	public function setUp()
	{
		parent::setUp();

		$this->app['config']->set('database.default', 'testing');

		$this->setUpTraits();

		$this->seedPermissions();

		$this->disableExceptionHandling();
	}

	protected function enableExceptionHandling()
	{
		$this->app->forgetInstance(ExceptionHandler::class);
	}

	protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new NullExceptionHandler);
    }
}
