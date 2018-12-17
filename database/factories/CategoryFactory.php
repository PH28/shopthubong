<?php

use Faker\Generator as Faker;

$factory->define(App\category::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->text,
        'parent_id'=>$faker->numberBetween($min = 1, $max = 5)
    ];
});
