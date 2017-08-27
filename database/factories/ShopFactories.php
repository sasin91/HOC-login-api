<?php

use App\Product;
use App\ProductType;
use App\Purchase;
use App\User;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Product::class, function (\Faker\Generator $faker) {
	return [
		'name' => $faker->bs,
		'is_virtual' => false,
		'reusable' => false,
		'type' => $faker->word,
		'value' => 'Dummy Value',
		'command' => 'Dummy command',
		'currency' => $faker->currencyCode,
		'cost' => $faker->numberBetween(0, 5000),
		'description' => $faker->bs,
	];
});

$factory->state(Product::class, 'published', function () {
	return ['published_at' => now()];
});

$factory->define(Purchase::class, function (\Faker\Generator $faker) {
	return [
		'user_id' => factory(User::class)->lazy(),
		'currency' => $faker->currencyCode,
		'amount' => $faker->numberBetween(100, 10000),
		'purchasable_type' => Product::class,
		'purchasable_id' => factory(Product::class)->lazy()
	];
});