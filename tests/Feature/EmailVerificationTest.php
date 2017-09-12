<?php

namespace Tests\Feature;

use App\Notifications\EmailVerification;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_generates_a_verification_token_upon_creation()
	{
		$user = create(User::class);

		$this->assertNotNull($user->verification_token);
	}

	/** @test */
	public function a_registered_user_can_verify_their_email()
	{
		$this->signIn($user = create(User::class));

		$this->get(route('me.verify-email', ['token' => $user->verification_token]))
			->assertSuccessful();

		$this->assertDatabaseHas('users', [
			'id' => $user->id,
			'verified_at' => now()
		]);
	}

	/** @test */
	public function it_dispatches_a_verification_email_upon_registration()
	{
		$this->artisan('passport:install');

		Notification::fake();

		$this->json('POST', '/api/register', [
			'name' => 'John doe',
			'email' => 'john@example.com',
			'password' => 'secret',
			'password_confirmation' => 'secret'
		])
			->assertSuccessful();

		$user = User::whereEmail('john@example.com')->first();
		Notification::assertSentTo($user, EmailVerification::class);
	}
}
