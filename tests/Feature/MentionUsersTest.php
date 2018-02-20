<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MentionUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function mentioned_users_in_a_reply_are_notified()
    {
        // Given we have a user, JohnDoe, who is signed in.
        $john = factory(\App\User::class)->create(['name' => 'JohnDoe']);

        $this->signIn($john);

        // And we also have a user, JaneDoe.
        $jane = factory(\App\User::class)->create(['name' => 'JaneDoe']);

        // If we have a thread
        $thread = factory(\App\Thread::class)->create();

        // And JohnDoe replies to that thread and mentions @JaneDoe.
        $this->postJson($thread->path() . '/replies', ['body' => 'Hey @JaneDoe check this out.'])
        ->assertSuccessful();

        // Then @JaneDoe should receive a notification.
        $this->assertCount(1, $jane->fresh()->notifications);
    }

    /** @test */
    function it_can_fetch_all_mentioned_users_starting_with_the_given_characters()
    {
        factory(\App\User::class)->create(['name' => 'johndoe']);
        factory(\App\User::class)->create(['name' => 'johndoe2']);
        factory(\App\User::class)->create(['name' => 'janedoe']);

        $response = $this->json('GET', route('users.search', ['query' => 'john']));
        $response->assertSuccessful();
        $response->assertJsonCount(2);
    }
}
