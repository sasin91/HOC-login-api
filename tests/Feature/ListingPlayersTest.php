<?php

namespace Tests\Feature;

use App\Player;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ListingPlayersTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	function can_list_inactive_players() 
	{
		$inactive_at = now()->subDays(Player::INACTIVE_AFTER_DAYS);

		factory(Player::class)->create(['last_seen_at' => $inactive_at]);

		$user = factory(User::class)->create();
		$user->givePermissionTo('list inactive players');

		Passport::actingAs($user);

		$this->json('GET', route('players.inactive'))
			 ->assertSuccessful()
			 ->assertCount(1)
			 ->assertSee($inactive_at->format('Y-m-d H:i:s'));
	} 

	/** @test */
	function can_list_offline_players() 
	{
		factory(Player::class)->create(['online_at' => null]);

		$user = factory(User::class)->create();
		$user->givePermissionTo('list offline players');

		Passport::actingAs($user);

		$this->json('GET', route('players.offline'))
			 ->assertSuccessful()
			 ->assertCount(1);
	}

		/** @test */
	function can_list_online_players() 
	{
		factory(Player::class)->create(['online_at' => now()]);

		$user = factory(User::class)->create();
		$user->givePermissionTo('list online players');

		Passport::actingAs($user);

		$this->json('GET', route('players.online'))
			 ->assertSuccessful()
			 ->assertCount(1);
	}

	/** @test */
	 function can_list_newbie_players() 
	 {
	 	factory(Player::class)->create();

		$user = factory(User::class)->create();
		$user->givePermissionTo('list newbie players');

		Passport::actingAs($user);

		$this->json('GET', route('players.newbies'))
			 ->assertSuccessful()
			 ->assertCount(1);
	 }  
}
