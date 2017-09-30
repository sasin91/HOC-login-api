<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use DatabaseMigrations;

	public function setUp()
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

	/** @test */
	function registered_user_request_a_password_reset() 
	{	
		Notification::fake();

		$user = factory(User::class)->create(['email' => 'john@example.com']);

		$this->json('post', '/api/send-password-reset', ['email' => 'john@example.com'])
			 ->assertSuccessful();

		Notification::assertSentTo($user, ResetPassword::class);
	}

	/** @test */
	function registered_user_can_reset_their_password() 
	{
		$this->enableExceptionHandling();

		$user = factory(User::class)->create(['email' => 'john@example.com']);
		$token = Password::broker()->getRepository()->create($user);

		$this->json('post', '/api/reset-password', [
			'email' => 'john@example.com', 
			'token' => $token, 
			'password' => 'secret',
			'password_confirmation' => 'secret'
		])
			 ->assertSuccessful();

		$this->assertTrue(
			Auth::attempt(['email' => 'john@example.com', 'password' => 'secret'])
		);
	} 
}
