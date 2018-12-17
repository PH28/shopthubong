<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'date_order'=>$faker->dateTime,
        'address_order'=>$faker->address,
        'phone_order'=>$faker->phoneNumber,
        'total'=>$faker->numberBetween($min = 50, $max = 500000),
        'payment'=>$faker->numberBetween($min = 0, $max = 1),
        'status'=>$faker->randomLetter,
        'user_id'=>$faker->numberBetween($min = 1, $max = 5),
    ];
});
