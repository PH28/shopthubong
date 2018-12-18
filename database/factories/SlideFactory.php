<?php

use Faker\Generator as Faker;

$factory->define(App\Slide::class, function (Faker $faker) {
    return [
        'url'=>$faker->imageUrl(50, 60),
        'image'=>$faker->name,
    ];
});
