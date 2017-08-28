<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateChannelsTest extends TestCase
{
	use DatabaseMigrations;

   /** @test */
    function guests_may_not_create_channels()
    {
        $this->json('POST', route('channel.store'))
             ->assertStatus(401);
    }

    /** @test */
    function an_authorized_user_can_create_new_forum_channels()
    {
        $this->signIn();

        $channel = make('App\Channel');

        $this->json('POST', route('channel.store'), $channel->toArray())
             ->assertSee($channel->name);
    }
    
    /** @test */
    function can_specify_an_optional_slug() 
    {
    	$this->signIn();

    	$board = create('App\Board');

	    $this->json('POST', route('channel.store'), [
		    'board_id' => $board->id,
		    'name' => 'Space goats & high voltage weed',
		    'slug' => 'electric-weed',
		    'description' => 'its Electrifying!'
	    ])
             ->assertSuccessful()
             ->assertSee('Space goats & high voltage weed')
             ->assertSee('electric-weed');
    }

    /** @test */
    function it_automagically_builds_a_slug_from_name() 
    {
    	$this->signIn();

    	$board = create('App\Board');

	    $this->json('POST', route('channel.store'),
		    ['board_id' => $board->id, 'name' => 'Star chasers', 'description' => 'random descr'])
             ->assertSuccessful()
             ->assertSee('Star chasers')
             ->assertSee('star-chasers');
    } 

    /** @test */
    function a_channel_requires_a_name()
    {
    	$this->signIn();

        $this->json('POST', route('channel.store'), ['name' => null])
             ->assertValidationErrors('name');
    }

    /** @test */
    function unauthorized_users_may_not_delete_channels()
    {
        $channel = create('App\Channel');

        $this->json('DELETE', $channel->path())->assertStatus(401);

        $this->signIn();
        $this->delete($channel->path())->assertStatus(403);
    }

    /** @test */
    function moderators_can_delete_channels()
    {
        $this->signInAsModerator();

        $channel = create('App\Channel');

        $response = $this->json('DELETE', $channel->path());

        $response->assertSuccessful();

        $this->assertDatabaseMissing('channels', ['id' => $channel->id]);
    }

    /** @test */
    function creator_can_delete_their_channels() 
    {
    	$this->signIn();

        $channel = create('App\Channel', ['creator_id' => auth()->id()]);

        $response = $this->json('DELETE', $channel->path());

        $response->assertSuccessful();

        $this->assertDatabaseMissing('channels', ['id' => $channel->id]);
    } 
}
