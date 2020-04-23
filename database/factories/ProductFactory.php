<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->ingredient,
        'description' => $faker->text(500),
        'price' => $faker->randomNumber(4),
        'category_id' => $faker->numberBetween(1,4)
    ];
});
