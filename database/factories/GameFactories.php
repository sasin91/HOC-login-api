<?php

use App\Character;
use App\CharacterTemplate;
use App\Player;
use App\Server;
use App\User;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Server::class, function (Faker $faker) {
	return [
		'name'          =>  $faker->name,
		'ip'            =>  $faker->ipv4,
		'map'           =>  $faker->word,
		'game_type'     =>  $faker->word,
		'players_limit' =>  $faker->numberBetween(5,100),
		'MNP'           =>  $faker->word
	];
});

$factory->define(Player::class, function ($faker) {
	return [
		'server_id' => 	factory(Server::class)->lazy(),
		'user_id' 	=> 	factory(User::class)->lazy(),
		'experience' => 0,
		'experience_rate' => 100
	];
});

$factory->define(CharacterTemplate::class, function (Faker $faker) {
	return [
		'name' => $faker->userName,
		'role' => $faker->randomElement(['DPS', 'Tank', 'Support']),
		'ranged' => $faker->boolean(50),
		'melee' => $faker->boolean(50),
		'resource_type' => $faker->randomElement(['Mana', 'Energy']),
		'health' => $faker->numberBetween(100, 500),
		'resource' => $faker->numberBetween(100, 500),
		'stamina' => $faker->numberBetween(100, 500),
		'cost' => $faker->numberBetween(0, 1000),
		'currency' => 'chevron'
	];
});

$factory->define(Character::class, function (Faker $faker) {
	return [
		'template_id' => function () {
			if (CharacterTemplate::count() > 0) {
				return CharacterTemplate::all()->random(1)->first()->id;
			}

			return factory(CharacterTemplate::class)->create()->id;
		}
	];
});