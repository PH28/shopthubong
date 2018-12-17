<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'review_text'=>$faker->text,
        'status'=>$faker->randomLetter,
        'option_id'=>$faker->numberBetween($min = 1, $max = 5),
        'user_id'=>$faker->numberBetween($min = 1, $max = 5),
        'product_id'=>$faker->numberBetween($min = 1, $max = 5),
    ];
});
