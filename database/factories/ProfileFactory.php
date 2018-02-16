<?php

use Faker\Generator as Faker;

$factory->define(\scoutsys\Models\Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
