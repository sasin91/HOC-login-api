<?php

namespace Tests\Feature;

use Payment;
use App\ExperienceBoost;
use App\Character;
use App\Player;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Passport\Passport;
use Tests\TestCase;

/**
 * This test covers the in game shop interactions from the game's internal browser.
 */
class IngameShopTest extends TestCase
{
	/** @test */
	function a_player_can_unlock_characters_by_spending_ingame_chevron() 
	{
		$player = factory(Player::class)->create(['chevron' => 10000]);
		$character = factory(Character::class)->create(['cost' => 10000]);

		Passport::actingAs($player->user);

		$this->json('POST', route('shop.purchase', $item))
			 ->assertSuccessful();

		$this->assertDatabaseHas('ingame_purchases', [
			'player_id' 	=>	$player->id,
			'item_id'		=>	$character->id,
			'item_type'		=>	Character::class,
			'purchased_at' 	=>	now()
		]);

		$player->characters->assertContains($character);
	}

	/** @test */
	function a_player_can_unlock_characters_by_real_money() 
	{
		$player = factory(Player::class)->create();
		$character = factory(Character::class)->create(['cost' => 10000]);

		Passport::actingAs($player->user);

		$this->json('POST', route('shop.purchase', $item), ['payment_token' => Payment::validTestToken()])
			 ->assertSuccessful();

		$this->assertDatabaseHas('ingame_purchases', [
			'player_id' 	=>	$player->id,
			'item_id'		=>	$character->id,
			'item_type'		=>	Character::class,
			'purchased_at' 	=>	now()
		]);

		$player->characters->assertContains($character);
	}

	/** @test */
	 function a_player_can_purchase_experience_boost_packages_for_real_money() 
	 {
	 	$player = factory(Player::class)->create();
	 	$boost = factory(ExperienceBoost::class)->create();
	 }  
}
