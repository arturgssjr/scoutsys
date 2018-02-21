<?php

use Faker\Generator as Faker;

$factory->define(scoutsys\Models\Detail::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'phone' => $faker->phone,
        'zipcode' => $faker->postcode,
        'photo' => $faker->mimeType,
        'city' => $faker->city,
        'state' => $faker->state
    ];
});
