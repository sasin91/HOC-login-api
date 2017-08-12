<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\TestResponse;
use PHPUnit\Framework\Assert as PHPUnit;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();

        $this->seed(\PermissionsTableSeeder::class);

        TestResponse::macro('assertCount', function ($excepted) {
            PHPUnit::assertCount($excepted, $this->decodeResponseJson());

            return $this;
        });

        TestResponse::macro('assertValidationError', function ($field) {
            $this->assertStatus(422);
            PHPUnit::assertArrayHasKey($field, $this->decodeResponseJson());

            return $this;
        });
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct()
            {
            }
            public function report(\Exception $e)
            {
            }
            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }
}
