<?php

use Faker\Generator as Faker;
use App\Models\Team;

$factory->define(Team::class, function (Faker $faker) {
    static $i = 1;
    return [
    	'organization_id' => $i % 2 ? 1 : 2,
        'user_id' => $i++, 
        'title' => $faker->words(2, true),
    ];
});
