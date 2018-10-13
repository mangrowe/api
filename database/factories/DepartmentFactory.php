<?php

use Faker\Generator as Faker;
use App\Models\Department;

$factory->define(Department::class, function (Faker $faker) {
	static $i = 1;
	static $j = 0;
	$j++;
    return [
        'organization_id' => $i % 2 ? $i : 2,
        'parent_id' => $j % 2 ? ($j == 1 ? null : (1 - $j)) : 2,
        'title' => $faker->words(4, true),
    ];
});
