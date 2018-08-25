<?php

use Faker\Generator as Faker;
use App\Models\Team;

$factory->define(Team::class, function (Faker $faker) {
    static $i = 1;
    return [
        'user_id' => $i++, 
        'title' => $faker->words(2, true),
    ];
});
