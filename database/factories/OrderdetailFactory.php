<?php

use Faker\Generator as Faker;

$factory->define(App\Order_detail::class, function (Faker $faker) {
    return [
        'quantity'=>$faker->numberBetween($min = 5, $max = 10),
        'unit_price'=>$faker->numberBetween($min = 50, $max = 500), 
        'order_id'=>$faker->numberBetween($min = 1, $max = 5),
        'product_id'=>$faker->numberBetween($min = 1, $max = 5)
    ];
});
