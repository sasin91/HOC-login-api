<?php

namespace Tests\Feature;

use App\Activity;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

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

        $thread = make('App\Thread');

	    $this->post('/api/threads', $thread->toArray())
             ->assertSee($thread->title)
             ->assertSee($thread->body);
    }

    /** @test */
    function a_thread_requires_a_title()
    {
	    $this->enableExceptionHandling();

	    $this->publishThread(['title' => null])
            ->assertValidationErrors('title');
    }

    /** @test */
    function a_thread_requires_a_body()
    {
	    $this->enableExceptionHandling();

	    $this->publishThread(['body' => null])
            ->assertValidationErrors('body');
    }

    /** @test */
    function a_thread_requires_a_valid_channel()
    {
	    $this->enableExceptionHandling();

	    factory('App\Channel', 2)->create();

        $this->publishThread(['channel_id' => null])
            ->assertValidationErrors('channel_id');

        $this->publishThread(['channel_id' => 999])
            ->assertValidationErrors('channel_id');
    }

    /** @test */
    function unauthorized_users_may_not_delete_threads()
    {
	    $this->enableExceptionHandling();

	    $thread = create('App\Thread');

        $this->json('DELETE', $thread->path())->assertStatus(401);

        $this->signIn();
        $this->delete($thread->path())->assertStatus(403);
    }

    /** @test */
    function authorized_users_can_delete_threads()
    {
        $this->signIn();

        $thread = create('App\Thread', ['user_id' => auth()->id()]);
        $reply = create('App\Reply', ['thread_id' => $thread->id]);

        $response = $this->json('DELETE', $thread->path());

	    $response->assertStatus(200);

        $this->assertDatabaseMissing('threads', ['id' => $thread->id]);
        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);

        $this->assertEquals(0, Activity::count());
    }

    protected function publishThread($overrides = [])
    {
        $this->signIn();

        $thread = make('App\Thread', $overrides);

        return $this->json('POST', route('threads.store'), $thread->toArray());
    }
}
