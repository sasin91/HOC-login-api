<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FavoritesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_can_not_favorite_anything()
    {
        $this->enableExceptionHandling();

        $this->json('POST', '/api/replies/1/favorites')
             ->assertStatus(401);
    }

    /** @test */
    public function an_authenticated_user_can_favorite_any_reply()
    {
        $this->signIn();

        $reply = factory(\App\Reply::class)->create();

        $this->json('POST', '/api/replies/' . $reply->id . '/favorites');

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_can_unfavorite_a_reply()
    {
        $this->signIn();

        $reply = factory(\App\Reply::class)->create();

        $reply->favorite();

        $this->json('DELETE', '/api/replies/' . $reply->id . '/favorites');

        $this->assertCount(0, $reply->favorites);
    }

    /** @test */
    function an_authenticated_user_may_only_favorite_a_reply_once()
    {
        $this->signIn();

        $reply = factory(\App\Reply::class)->create();

        try {
            $this->json('POST', '/api/replies/' . $reply->id . '/favorites');
            $this->json('POST', '/api/replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            $this->fail('Did not expect to insert the same record set twice.');
        }

        $this->assertCount(1, $reply->favorites);
    }
}
