<?php

use Faker\Generator as Faker;

$factory->define(\scoutsys\Models\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
