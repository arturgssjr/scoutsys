<?php

use Faker\Generator as Faker;

$factory->define(scoutsys\Models\Status::class, function (Faker $faker) {
    return [
        'description' => $faker->word
    ];
});
