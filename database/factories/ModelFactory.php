<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' 				=>	$faker->name,
        'email' 			=>	$faker->unique()->safeEmail,
        'password' 			=>	$password ?: $password = bcrypt('secret'),
        'remember_token' 	=> 	str_random(10),
    ];
});

$factory->define(App\Server::class, function ($faker) {
    return [
        'name'          =>  $faker->name,
        'ip'            =>  $faker->ipv4,
        'map'           =>  $faker->word,
        'game_type'     =>  $faker->word,
        'players_limit' =>  $faker->numberBetween(5,100),
        'MNP'           =>  $faker->word
    ];
});

$factory->define(App\Player::class, function (Faker\Generator $faker) {
    return [
        'server_id' => 	factory(App\Server::class)->lazy(),
        'user_id' 	=> 	factory(App\User::class)->lazy(),
    ];
});

