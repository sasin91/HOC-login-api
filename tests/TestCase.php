<?php

namespace Tests;
include 'helpers.php';

use App\Exceptions\Handler;
use App\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;
use Tests\NullExceptionHandler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        $this->seed(\PermissionsTableSeeder::class);
    }

    protected function signInAsModerator($user = null)
    {
        return $this->signInWithRole('Moderator', $user);
    }

    protected function signInAsAdmin($user = null)
    {
        return $this->signInWithRole('Admin', $user);
    }

    protected function signInWithRole($role, $user = null)
    {
        return tap($this->signIn($user), function () use($role){
            auth()->user()->assignRole($role);
        });
    }

    protected function signIn($user = null)
    {
        Passport::actingAs($user ? $user : factory(User::class)->create());

        return $this;
    }

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new NullExceptionHandler);
    }
}
