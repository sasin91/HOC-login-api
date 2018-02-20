<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadThreadsTest extends TestCase
{
    use RefreshDatabase;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory(\App\Thread::class)->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $this->getJson('/api/threads')->assertJson([
            'data' => [
                ['title' => $this->thread->title]
            ]
        ]);
    }

    /** @test */
    function a_user_can_read_a_single_thread()
    {
        $this->getJson($this->thread->path())
            ->assertJson(['title' => $this->thread->title]);
    }

    /** @test */
    function a_user_can_filter_threads_according_to_a_channel()
    {
        $channel = factory(\App\Channel::class)->create();
        $threadInChannel = factory(\App\Thread::class)->create(['channel_id' => $channel->id]);
        $threadNotInChannel = factory(\App\Thread::class)->create();

        $this->getJson('/api/threads/' . $channel->slug)
            ->assertJsonCount(1, 'data');
    }

    /** @test */
    function a_user_can_filter_threads_by_any_username()
    {
        $this->signIn(factory(\App\User::class)->create(['name' => 'JohnDoe']));

        $threadByJohn = factory(\App\Thread::class)->create(['user_id' => auth()->id()]);
        factory(\App\Thread::class);

        $this->getJson('/api/threads?by=JohnDoe')
            ->assertJson([
                'data' => [
                    [
                        'title' => $threadByJohn->title
                    ]
                ]
            ]);
    }

    /** @test */
    function a_user_can_filter_threads_by_popularity()
    {
        $threadWithTwoReplies = factory(\App\Thread::class)->create();
        factory(\App\Reply::class, 2)->create(['thread_id' => $threadWithTwoReplies->id]);

        $threadWithThreeReplies = factory(\App\Thread::class)->create();
        factory(\App\Reply::class, 3)->create(['thread_id' => $threadWithThreeReplies->id]);

        $response = $this->getJson('/api/threads?popular=1')->json();

        $this->assertEquals([3, 2, 0], array_column($response['data'], 'replies_count'));
    }

    /** @test */
    function a_user_can_filter_threads_by_those_that_are_unanswered()
    {
        $thread = factory(\App\Thread::class)->create();
        factory(\App\Reply::class)->create(['thread_id' => $thread->id]);

        $this->getJson('/api/threads?unanswered=1')
            ->assertJsonCount(1, 'data');
    }

    /** @test */
    function a_user_can_request_all_replies_for_a_given_thread()
    {
        $thread = factory(\App\Thread::class)->create();
        factory(\App\Reply::class, 2)->create(['thread_id' => $thread->id]);

        $response = $this->getJson($thread->path() . '/replies');
        $response->assertJsonCount(2, 'data');
        $response->assertJson([
            'total' => 2
        ]);
    }
}
