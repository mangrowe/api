<?php

use Faker\Generator as Faker;
use App\Models\Cycle;

$factory->define(Cycle::class, function (Faker $faker) {
    static $i = 1;
    return [
        'organization_id' => $i % 2 ? $i : 2,
        'title' => $faker->words(4, true),
        'description' => $faker->sentence,
        'start_at' => '2018-'. $i .'-01',
        'end_at' => '2018-'. ++$i .'-01',
    ];
});
