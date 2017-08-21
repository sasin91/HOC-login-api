<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AuthTest extends TestCase
{
	protected function setUp()
	{
		parent::setUp();

		$this->artisan('passport:install');
	}

	/** @test */
	function a_visitor_can_register() 
	{
		$this->disableExceptionHandling();

		$this->json('POST', '/api/register', ['name' => 'John doe', 'email' => 'john@example.com', 'password' => 'secret', 'password_confirmation' => 'secret'])
			 ->assertSuccessful();
	} 

	/** @test */
	function an_api_user_can_login() 
	{
		$this->disableExceptionHandling();

		$user = factory(User::class)->create(['email' => 'john@example.com', 'password' => bcrypt('secret')]);

		$this->json('POST', '/api/login', ['email' => 'john@example.com', 'password' => 'secret'])
			 ->assertSuccessful();

		$this->assertNotEmpty($user->tokens);
	}

	/** @test */
	function authenticated_user_can_logout() 
	{
		auth()->login($user = factory(User::class)->create());

		$this->json('POST', '/api/logout')
			 ->assertSuccessful();

		$this->assertFalse(auth()->check());
	} 
}
