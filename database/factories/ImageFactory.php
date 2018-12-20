<?php

use Faker\Generator as Faker;
use App\Product;
$factory->define(App\Image::class, function (Faker $faker) {
	$product_id = Product::pluck('id');
    return [
        'url'=>$faker->imageUrl(50, 60),
        'image'=>$faker->name,
        'product_id'=>$faker->randomElement($product_id)
    ];
});
