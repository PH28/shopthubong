<?php

use Faker\Generator as Faker;
use App\User;
use App\Product;

$factory->define(App\Review::class, function (Faker $faker) {
	$user_id =  User::pluck('id');
	$product_id = Product::pluck('id');
    return [
        'review_text'=>$faker->text,
        'status'=>$faker->numberBetween($min = 1, $max = 5),
        'user_id'=>$faker->randomElement($user_id),
        'product_id'=>$faker->randomElement($product_id)
    ];
});
