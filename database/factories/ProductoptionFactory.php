<?php

use Faker\Generator as Faker;

$factory->define(App\Product_option::class, function (Faker $faker) {
    return [
        'price_increase'=>$faker->numberBetween($min = 5, $max = 10),
        'product_id'=>$faker->numberBetween($min = 1, $max = 5),
        'option_id'=>$faker->numberBetween($min = 1, $max = 5)
    ];
});
