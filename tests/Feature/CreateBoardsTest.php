<?php

namespace Tests\Feature;

use App\Activity;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateBoardsTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
    function guests_may_not_create_boards()
    {
        $this->enableExceptionHandling();

        $this->json('POST', route('board.store'))
             ->assertStatus(401);
    }

    /** @test */
    function a_moderator_can_create_new_forum_boards()
    {
        $this->signInAsModerator();

        $board = make(\App\Board::class);

        $this->post(route('board.store'), $board->toArray())
             ->assertSee($board->topic)
             ->assertSee($board->description);
    }

    /** @test */
    function a_board_requires_a_topic()
    {
        $this->enableExceptionHandling();

        $this->signInAsModerator();

        $this->postJson(route('board.store'),
            ['topic' => null, 'description' => 'some-description']
        )->assertJsonValidationErrors('topic');
    }

    /** @test */
    function a_board_requires_a_description()
    {
        $this->enableExceptionHandling();

        $this->signInAsModerator();

        $this->json('POST', route('board.store'), ['description' => null, 'topic' => 'testing'])
            ->assertJsonValidationErrors('description');
    }

    /** @test */
    function unauthorized_users_may_not_delete_boards()
    {
        $this->enableExceptionHandling();

        $board = factory(\App\Board::class)->create();

        $this->deleteJson($board->path())->assertStatus(401);

        $this->signIn();
        $this->delete($board->path())->assertStatus(403);
    }

    /** @test */
    function moderators_can_delete_boards()
    {
        $this->signInAsModerator();

        $board = factory(\App\Board::class)->create();

        $response = $this->json('DELETE', $board->path());

        $response->assertSuccessful();

        $this->assertDatabaseMissing('boards', ['id' => $board->id]);
    }

    /** @test */
    function creator_can_delete_their_boards()
    {
        $this->signIn();

        $board = factory(\App\Board::class)->create(['creator_id' => auth()->id()]);

        $response = $this->json('DELETE', $board->path());

        $response->assertSuccessful();

        $this->assertDatabaseMissing('boards', ['id' => $board->id]);

        $this->assertEquals(0, Activity::count());
    }
}
