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

$factory->define(Logistic\PurchaseOrder::class, function (Faker $faker) {
    return [
        'delivery_address'  => $faker->address,
        'delivery_at'       => $faker->dateTime('+ 60 days', 'America/Bogota'),
        'requested_at'      => $faker->dateTime('now', 'America/Bogota'),
    ];
});
