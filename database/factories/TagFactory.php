<?php

use Faker\Generator as Faker;

use App\Models\Tag;

$factory->define(Tag::class, function (Faker $faker) {
    return [
    	'organization_id' => rand(1, 3),
        'title' => strtolower($faker->word),
    ];
});
