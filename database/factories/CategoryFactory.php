<?php

use Faker\Generator as Faker;

$factory->define(\scoutsys\Models\Category::class, function (Faker $faker) {
    return [
        'description' => $faker->word
    ];
});
