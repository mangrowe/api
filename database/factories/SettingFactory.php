<?php

use Faker\Generator as Faker;

use App\Models\Setting;

$factory->define(Setting::class, function (Faker $faker) {
	static $i = 1;
    return [
        'organization_id' => 1,
        'title' => $faker->word,
        'code' => 'ruler',
        'info' => ++$i % 2 ? 70 : 100,
        'additional' => $i % 2 ? 'orange' : 'green',
    ];
});
