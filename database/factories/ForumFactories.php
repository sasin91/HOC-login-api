<?php

use App\Board;
use App\Channel;
use App\Thread;
use App\User;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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

$factory->define(App\Thread::class, function (\Faker\Generator $faker) {
	return [
		'user_id' => factory(User::class)->lazy(),
		'channel_id' => factory(Channel::class)->lazy(),
		'title' => $faker->sentence(3),
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