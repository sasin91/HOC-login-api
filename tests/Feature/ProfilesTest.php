<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_has_a_profile()
    {
        $user = factory(\App\User::class)->create();

        $this->getJson("/api/profiles/{$user->name}")
             ->assertJson([
                 'user' => $user->toArray()
             ]);
    }

    /** @test */
    function profiles_display_all_threads_created_by_the_associated_user()
    {
        //TODO: Is this needed?
        $this->markTestSkipped('Not sure if this is needed?');

        $this->signIn();

        $thread = factory(\App\Thread::class, ['user_id' => auth()->id()])->create();

        $this->json('GET', "/api/profiles/" . auth()->user()->name)
            ->assertJson([
                'title' => $thread->title,
                'body' => $thread->body
            ]);
    }
}
