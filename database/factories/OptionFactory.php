<?php

use Faker\Generator as Faker;

$factory->define(App\Option::class, function (Faker $faker) {
    return [
       'name'=>$faker->name,
       'option_group_id'=>$faker->numberBetween($min = 1, $max = 5)
    ];
});
