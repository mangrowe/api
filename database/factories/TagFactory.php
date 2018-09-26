<?php

use Faker\Generator as Faker;

use App\Models\Tag;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => strtolower($faker->word),
    ];
});
