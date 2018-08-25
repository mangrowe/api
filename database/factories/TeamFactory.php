<?php

use Faker\Generator as Faker;
use App\Models\Team;

$factory->define(Team::class, function (Faker $faker) {
    static $i = 1;
    return [
        'title' => $faker->words(2, true),
        'user_id' => $i++, 
    ];
});
