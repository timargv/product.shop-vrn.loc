<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'parent_id' => $faker->randomNumber($nbDigits = 1),
        '_lft' => $faker->randomNumber($nbDigits = 1),
        '_rgt' => $faker->randomNumber($nbDigits = 1),


    ];


});
