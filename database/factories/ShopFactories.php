<?php

use App\Product;
use App\ProductType;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(ProductType::class, function (\Faker\Generator $faker) {
	return [
		'name' => $faker->bs,
		'description' => $faker->paragraph,
		'command' => 'Dummy Command'
	];
});

$factory->define(Product::class, function (\Faker\Generator $faker) {
	return [
		'reusable' => false,
		'type_id' => factory(ProductType::class)->lazy()->id,
		'value' => 'Dummy Value',
		'currency' => $faker->currencyCode,
		'cost' => $faker->numberBetween(0, 5000),
		'description' => $faker->bs,
	];
});

$factory->state(Product::class, 'published', function () {
	return ['published_at' => now()];
});