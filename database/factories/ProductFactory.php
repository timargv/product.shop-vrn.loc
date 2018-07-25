<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [

      'title' => $faker->name,
      'user_id' => 1,

    ];
});
