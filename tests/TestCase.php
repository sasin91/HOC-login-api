<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, SignIn;

    public function setUp()
    {
        parent::setUp();

        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshDatabase::class])) {
            $this->seedPermissions();
        }
    }

    public function disableExceptionHandling($except = [])
    {
        return $this->withoutExceptionHandling($except);
    }

    public function enableExceptionHandling()
    {
        return $this->withExceptionHandling();
    }
}
