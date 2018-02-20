<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParticipateInThreadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        $this->enableExceptionHandling();

        $this->json('POST', '/api/threads/some-channel/1/replies', [])->assertStatus(401);
    }

    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->signIn();

        $thread = factory(\App\Thread::class)->create();
        $reply = factory(\App\Reply::class)->make();

        $this->post($thread->path() . '/replies', $reply->toArray());

        $this->assertDatabaseHas('replies', ['body' => $reply->body]);
        $this->assertEquals(1, $thread->fresh()->replies_count);
    }

    /** @test */
    function a_reply_requires_a_body()
    {
        $this->enableExceptionHandling();

        $this->signIn();

        $thread = factory(\App\Thread::class)->create();
        $reply = factory(\App\Reply::class, ['body' => null])->make();

        $this->post($thread->path() . '/replies', $reply->toArray())
             ->assertSessionHasErrors('body');
    }

    /** @test */
    function unauthorized_users_cannot_delete_replies()
    {
        $this->enableExceptionHandling();

        $reply = factory(\App\Reply::class)->create();

        $this->json('DELETE', "/api/replies/{$reply->id}")
            ->assertStatus(401);
 
        $this->signIn()
            ->json('DELETE', "/api/replies/{$reply->id}")
            ->assertStatus(403);
    }

    /** @test */
    function authorized_users_can_delete_replies()
    {
        $this->signIn();
        $reply = factory(\App\Reply::class)->create(['user_id' => auth()->id()]);

        $this->json('DELETE', "/api/replies/{$reply->id}")->assertSuccessful();

        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);

        $this->assertEquals(0, $reply->thread->fresh()->replies_count);
    }

    /** @test */
    function unauthorized_users_cannot_update_replies()
    {
        $this->enableExceptionHandling();

        $reply = factory(\App\Reply::class)->create();

        $this->json('PATCH', "/api/replies/{$reply->id}")
            ->assertStatus(401);

        $this->signIn()
            ->json('PATCH', "/api/replies/{$reply->id}")
            ->assertStatus(403);
    }

    /** @test */
    function authorized_users_can_update_replies()
    {
        $this->signIn();

        $reply = factory(\App\Reply::class)->create(['user_id' => auth()->id()]);

        $updatedReply = 'You been changed, fool.';
        $this->json('PATCH', "/api/replies/{$reply->id}", ['body' => $updatedReply])
        ->assertSuccessful();

        $this->assertDatabaseHas('replies', ['id' => $reply->id, 'body' => $updatedReply]);
    }

    /** @test */
    function replies_that_contain_spam_may_not_be_created()
    {
        $this->enableExceptionHandling();

        $this->signIn();

        $thread = factory(\App\Thread::class)->create();
        $reply = factory(\App\Reply::class, [
            'body' => 'Yahoo Customer Support'
        ])->make();

        $this->json('post', $thread->path() . '/replies', $reply->toArray())
            ->assertStatus(422);
    }

    /** @test */
    function users_may_only_reply_a_maximum_of_once_per_minute()
    {
        $this->enableExceptionHandling();

        $this->signIn();

        $thread = factory(\App\Thread::class)->create();
        $reply = factory(\App\Reply::class)->make();

        $this->json('POST', $thread->path() . '/replies', $reply->toArray())
            ->assertStatus(200);

        $this->json('POST', $thread->path() . '/replies', $reply->toArray())
            ->assertStatus(429);
    }
}
