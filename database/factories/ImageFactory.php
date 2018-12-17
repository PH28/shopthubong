<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'url'=>$faker->imageUrl(50, 60),
        'image'=>$faker->name,
        'product_id'=>$faker->numberBetween($min = 1, $max = 5)
    ];
});
