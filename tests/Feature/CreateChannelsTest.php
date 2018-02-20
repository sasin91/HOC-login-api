<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateChannelsTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
    function guests_may_not_create_channels()
    {
        $this->enableExceptionHandling();

        $this->json('POST', route('channel.store'))
             ->assertStatus(401);
    }

    /** @test */
    function an_authorized_user_can_create_new_forum_channels()
    {
        // :TODO fix this stupid test!
        $this->markTestInComplete('Requires refactoring');

        $this->signIn();

        $channel = factory(\App\Channel::class)->make(['creator_id' => null]);

        $this->postJson(route('channel.store'), [
            'name' => 'testing',
            'description' => 'testing1',
            'slug' => 'testing1',
            ''
        ])
             ->assertJson(collect($channel->toArray())->merge(['user_id' => auth()->id()])->all());
    }
    
    /** @test */
    function can_specify_an_optional_slug()
    {
        // :TODO fix this stupid test!
        $this->markTestInComplete('Requires refactoring');

        $this->signIn();

        $board = factory(\App\Board::class)->create();

        $this->enableExceptionHandling()->postJson(route('channel.store'), [
            'board_id' => $board->id,
            'name' => 'Space goats & high voltage weed',
            'slug' => 'electric-weed',
            'description' => 'its Electrifying!'
        ])->assertStatus(201)
        ->assertJson([
            'name' => 'Space goats & high voltage weed',
            'slug' => 'electric-weed',
            'description' => 'its Electrifying!'
        ]);
    }

    /** @test */
    function it_automagically_builds_a_slug_from_name()
    {
        $this->signIn();

        $board = factory(\App\Board::class)->create();

        $this->json(
            'POST',
            route('channel.store'),
            ['board_id' => $board->id, 'name' => 'Star chasers', 'description' => 'random descr']
        )
             ->assertSuccessful()
             ->assertSee('Star chasers')
             ->assertSee('star-chasers');
    }

    /** @test */
    function a_channel_requires_a_name()
    {
        $this->enableExceptionHandling();

        $this->signIn();

        $response = $this->postJson(route('channel.store'), ['name' => null]);
        $response->assertJsonValidationErrors('name');
    }

    /** @test */
    function unauthorized_users_may_not_delete_channels()
    {
        $this->enableExceptionHandling();

        $channel = factory(\App\Channel::class)->create();

        $this->deleteJson($channel->path())->assertStatus(401);

        $this->signIn();
        $this->deleteJson($channel->path())->assertStatus(403);
    }

    /** @test */
    function moderators_can_delete_channels()
    {
        // :TODO fix this stupid test!
        $this->markTestInComplete('Requires refactoring');

        $this->signInAsModerator();

        $channel = factory(\App\Channel::class);

        $response = $this->json('DELETE', $channel->path());

        $response->assertSuccessful();

        $this->assertDatabaseMissing('channels', ['id' => $channel->id]);
    }

    /** @test */
    function creator_can_delete_their_channels()
    {
        // :TODO fix this stupid test!
        $this->markTestInComplete('Requires refactoring');

        $this->signIn();

        $channel = factory(\App\Channel::class)->create(['creator_id' => auth()->id()]);

        $response = $this->json('DELETE', $channel->path());

        $response->assertSuccessful();

        $this->assertDatabaseMissing('channels', ['id' => $channel->id]);
    }
}
