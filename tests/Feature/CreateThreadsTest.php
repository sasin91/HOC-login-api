<?php

namespace Tests\Feature;

use App\Activity;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_may_not_create_threads()
    {
        $this->enableExceptionHandling();

        $this->json('POST', route('threads.store'))
             ->assertStatus(401);
    }

    /** @test */
    function an_authenticated_user_can_create_new_forum_threads()
    {
        $this->signIn();

        $thread = make(\App\Thread::class);

        $response = $this->postJson('/api/threads', $thread->toArray());
        $response->assertStatus(201);
    }

    /** @test */
    function a_thread_requires_a_title()
    {
        $this->enableExceptionHandling();

        $response = $this->publishThread(['title' => null]);
        $response->assertJsonValidationErrors('title');
    }

    /** @test */
    function a_thread_requires_a_body()
    {
        $this->enableExceptionHandling();

        $response = $this->publishThread(['body' => null]);
        $response->assertJsonValidationErrors('body');
    }

    /** @test */
    function a_thread_requires_a_valid_channel()
    {
        $this->enableExceptionHandling();

        factory(\App\Channel::class, 2)->create();

        $response = $this->publishThread(['channel_id' => null]);

        $response->assertJsonValidationErrors('channel_id');

        $response = $this->publishThread(['channel_id' => 999]);
        $response->assertJsonValidationErrors('channel_id');
    }

    /** @test */
    function unauthorized_users_may_not_delete_threads()
    {
        $this->enableExceptionHandling();

        $thread = factory(\App\Thread::class)->create();

        $this->json('DELETE', $thread->path())->assertStatus(401);

        $this->signIn();
        $this->delete($thread->path())->assertStatus(403);
    }

    /** @test */
    function authorized_users_can_delete_threads()
    {
        $this->signIn();

        $thread = factory(\App\Thread::class)->create(['user_id' => auth()->id()]);
        $reply = factory(\App\Reply::class)->create(['thread_id' => $thread->id]);

        $response = $this->json('DELETE', $thread->path());

        $response->assertStatus(200);

        $this->assertDatabaseMissing('threads', ['id' => $thread->id]);
        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);

        $this->assertEquals(0, Activity::count());
    }

    protected function publishThread($overrides = [])
    {
        $this->signIn();

        $thread = make(\App\Thread::class, $overrides);

        return $this->json('POST', route('threads.store'), $thread->toArray());
    }
}
