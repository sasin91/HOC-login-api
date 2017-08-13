<?php

namespace Tests\Feature;

use App\Player;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ItemsTest extends TestCase
{
	/** @test */
	function a_player_can_list_purchasable_items() 
	{
		$player = factory(Player::class)->create();

		$items = factory(Item::class)->times(3)->state('purchasable')->create();

		$this->json('GET', route('shop.index'))
			 ->assertSuccessful()
			 ->assertCount(3);
	}

	/** @test */
	function a_player_can_list_their_items() 
	{
		 $player = factory(Player::class)->create();
		 $items = $player->items()->saveMany(factory(Item::class)->times(3)->create());

		 $this->json('GET', route('me.player.items'))
		 	  ->assertSuccessful()
		 	  ->assertCount(3)
		 	  ->assertJson($items->jsonSerialize());
	}
}
