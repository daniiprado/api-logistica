<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Logistic\Product::class, function (Faker $faker) {
    return [
        'code'          => $faker->numerify('########'),
        'name'          => $faker->sentence,
        'stock'         => $faker->numberBetween(10, 900),
        'price'         => $faker->numberBetween(1000, 15000),
        'expired_at'    => $faker->dateTimeBetween('+ 1 year', '+ 2 years'),
    ];
});
