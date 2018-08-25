<?php

use Faker\Generator as Faker;
use App\Models\Objective;

$factory->define(Objective::class, function (Faker $faker) {
    static $i = 1;
    return [
        'cycle_id' => 1,
        'user_id' => $i % 2 ? 1 : 2,
        'team_id' => $i % 2 ? 2 : 1,
        'level' => Objective::STRATEGIC,
        'title' => $faker->words(4, true),
        'description' => $faker->sentence,
    ];
});
