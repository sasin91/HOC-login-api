<?php

use App\Product;
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
    return ['published_at' => now()->format('Y-m-d H:i:s')];
});

$factory->define(Purchase::class, function (\Faker\Generator $faker) {
    return [
        'currency' => $faker->randomElement(['DKK', 'EUR', 'USD']),
        'amount' => $faker->numberBetween(100, 10000),
        'buyer_id' => factory(User::class)->lazy(),
        'buyer_type' => User::class,
        'purchasable_type' => Product::class,
        'purchasable_id' => factory(Product::class)->lazy()
    ];
});
