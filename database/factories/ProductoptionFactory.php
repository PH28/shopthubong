<?php

use Faker\Generator as Faker;
use App\Product;
use App\Option;

$factory->define(App\ProductOption::class, function (Faker $faker) {
	$product_id = Product::pluck('id');
	$option_id = Option::pluck('id');
    return [
        'price_increase'=>$faker->numberBetween($min = 5, $max = 10),
        'product_id'=>$faker->randomElement($product_id),
        'option_id'=>$faker->randomElement($option_id)
    ];
});
