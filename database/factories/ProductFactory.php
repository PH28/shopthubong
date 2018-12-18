<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(App\Product::class, function (Faker $faker) {
	$category_id= Category::pluck('id');
    return [
        'name'=>$faker->name,
        'description'=>$faker->text,
        'price'=>$faker->numberBetween($min = 50, $max = 500000),
        'quantity'=>$faker->numberBetween($min = 5, $max = 10),
        'kind'=>$faker->numberBetween($min = 0, $max = 1),
        'category_id'=>$faker->randomElement($category_id)
    ];
});
