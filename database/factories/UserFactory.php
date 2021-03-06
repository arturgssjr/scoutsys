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

$factory->define(scoutsys\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'birth' => $faker->dateTime,
        'nickname' => $faker->name,
        'permission' => $faker->word,
        'password' => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        'remember_token' => str_random(10),
    ];
});
