c<?php

use App\Board;
use App\Channel;
use App\Thread;
use App\User;

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

$factory->define(App\Board::class, function ($faker) {
    return [
        'creator_id' => factory(User::class)->lazy(),
        'topic' => $faker->sentence,
        'description' => $faker->bs
    ];
});

$factory->define(App\Channel::class, function ($faker) {
    $name = $faker->word;

    return [
        'board_id' => factory(Board::class)->lazy(),
        'creator_id' => factory(User::class)->lazy(),
        'name' => $name,
        'slug' => $name,
        'description' => $faker->bs
    ];
});

$factory->define(App\Thread::class, function ($faker) {
    return [
        'user_id' => factory(User::class)->lazy(),
        'channel_id' => factory(Channel::class)->lazy(),
        'title' => $faker->sentence,
        'body'  => $faker->paragraph
    ];
});


$factory->define(App\Reply::class, function ($faker) {
    return [
        'thread_id' => factory(Thread::class)->lazy(),
        'user_id' => factory(User::class)->lazy(),
        'body'  => $faker->paragraph
    ];
});

$factory->define(\Illuminate\Notifications\DatabaseNotification::class, function ($faker) {
    return [
        'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        'type' => 'App\Notifications\ThreadWasUpdated',
        'notifiable_id' => function () {
            return auth()->id() ?: factory('App\User')->create()->id;
        },
        'notifiable_type' => 'App\User',
        'data' => ['foo' => 'bar']
    ];
});

