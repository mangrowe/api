<?php

use Faker\Generator as Faker;
use App\Models\KeyResult;

$factory->define(KeyResult::class, function (Faker $faker) {
    static $i = 0;
    $i++;
    return [
        'objective_id' => rand(1, 4),
        'user_id' => rand(1, 10),
        'title' => $faker->words(3, true),
        'description' => $faker->sentence,
        'type' => $i % 2 ? KeyResult::TYPES['boolean'] : KeyResult::TYPES['number'],
        'criteria' => KeyResult::GTE,
        'initial' => rand(1, 50),
        'current' => rand(51, 90),
        'target' => 100,
        'done' => false,
        'format' => $i % 2 ? KeyResult::FORMATS['currency'] : KeyResult::FORMATS['percentage'],
    ];
});
