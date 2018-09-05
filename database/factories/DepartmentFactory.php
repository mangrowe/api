<?php

use Faker\Generator as Faker;
use App\Models\Department;

$factory->define(Department::class, function (Faker $faker) {
	static $i = 1;
    return [
        'organization_id' => $i % 2 ? $i : 2,
        'parent_id' => $i % 2 ? ($i == 1 ? null : $i) : 2,
        'title' => $faker->words(4, true),
    ];
});
