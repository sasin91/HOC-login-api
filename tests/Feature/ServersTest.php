<?php

namespace Tests\Feature;

use App\Player;
use App\Server;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ServersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_join_a_server()
    {
        $user = factory(User::class)->create();
        $server = factory(Server::class)->create();

        Passport::actingAs($user);

        $this->json('POST', route('server.join', $server))->assertSuccessful();

        $this->assertDatabaseHas('players', [
            'user_id'   =>  $user->id,
            'server_id' =>  $server->id
        ]);
    }

    /** @test */
    function a_user_can_leave_a_server()
    {
        $player = factory(Player::class)->create();

        Passport::actingAs($player->user);

        $this->json('POST', route('server.leave', $player->server))->assertSuccessful();

        $this->assertDatabaseMissing('players', [
            'user_id'   =>  $player->user->id,
            'server_id' =>  $player->server->id
        ]);
    }

    /** @test */
    function cannot_join_a_full_server()
    {
        Passport::actingAs(factory(User::class)->create());

        $server = factory(Server::class)->create(['players_limit' => 0]);
        
        $this->json('POST', route('server.join', $server))
             ->assertStatus(503)
             ->assertSee('Server is full.');
    }
}
