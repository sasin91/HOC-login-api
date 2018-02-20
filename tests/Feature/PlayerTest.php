<?php

namespace Tests\Feature;

use App\Player;
use App\Server;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_view_their_player()
    {
        $player = factory(Player::class)->create(['online_at' => '2017-07-10 14:12:20']);

        Passport::actingAs($player->user);

        $this->json('GET', route('player.show', $player))
             ->assertSuccessful()
             ->assertSee('2017-07-10 14:12:20');
    }

    /** @test */
    function a_user_cannot_view_another_users_player()
    {
        $this->enableExceptionHandling();

        $player = factory(Player::class)->create();
        $user = factory(User::class)->create();
        
        Passport::actingAs($user);

        $this->json('GET', route('player.show', $player))
             ->assertStatus(403);
    }

    /** @test */
    function a_friend_can_view_another_users_player()
    {
        $player = factory(Player::class)->create(['online_at' => '2017-07-10 14:12:20']);
        $friend = factory(User::class)->create();

        $player->user->beFriend($friend);
        $friend->acceptFriendRequest($player->user);

        Passport::actingAs($friend);

        $this->json('GET', route('player.show', $player))
             ->assertSuccessful()
             ->assertSee('2017-07-10 14:12:20');
    }

    /** @test */
    function a_player_on_the_same_server_can_view_another_player()
    {
        $server  = factory(Server::class)->create();
        $player_one = factory(Player::class)->create(['server_id' => $server->id]);
        $player_two = factory(Player::class)->create(['server_id' => $server->id]);
        
        Passport::actingAs($player_one->user);
        $this->json('GET', route('player.show', $player_two))
             ->assertSuccessful();

        Passport::actingAs($player_two->user);
        $this->json('GET', route('player.show', $player_one))
             ->assertSuccessful();
    }
}
