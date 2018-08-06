<?php

use Faker\Generator as Faker;

$factory->define(App\Test::class, function (Faker $faker) {
    // return [
    //     'title' => $faker->name,
    //     'parent_id' => $faker->randomNumber($nbDigits = 1),
    //     '_lft' => $faker->randomNumber($nbDigits = 1),
    //     '_rgt' => $faker->randomNumber($nbDigits = 1),
    //
    //
    // ];

    return [
            'title' => $faker->unique()->name,
            'slug' => $faker->unique()->slug(2),
            'parent_id' => null,
        ];

});
