<?php

namespace Tests\Feature;

use App\Notifications\EmailVerification;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_generates_a_verification_token_upon_creation()
    {
        $user = factory(User::class)->create();

        $this->assertNotNull($user->verification_token);
    }

    /** @test */
    public function can_verify_the_token()
    {
        $user = factory(User::class)->create();

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
        //TODO: Why are we installing passport here manually?

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
