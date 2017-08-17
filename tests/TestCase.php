<?php

namespace Tests;
include 'helpers.php';

use App\Exceptions\Handler;
use App\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        $this->seed(\PermissionsTableSeeder::class);
    }

    protected function signIn($user = null)
    {
        Passport::actingAs($user ? $user : factory(User::class)->create());

        return $this;
    }

    protected function signInAsAdmin($user = null)
    {
        $user = $user ? $user : factory(User::class)->create();
        $user->assignRole('Admin');

        return $this->signIn($user);
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new Tests\ExceptionHandler);
    }
}
