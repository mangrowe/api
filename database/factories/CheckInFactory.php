<?php

use Faker\Generator as Faker;
use App\Models\CheckIn;

$factory->define(CheckIn::class, function (Faker $faker) {
    return [
        'key_result_id' => rand(1, 10),
        'user_id' => rand(1, 30),
        'previous' => rand(1, 50),
        'current' => rand(51, 90),
        'confidance' => rand(1, 3),
        'description' => $faker->sentence,
    ];
});
