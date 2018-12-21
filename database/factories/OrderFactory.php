<?php

use Faker\Generator as Faker;
use App\Role;

$factory->define(App\Order::class, function (Faker $faker) {
	$user_id = Role::pluck('id');
    return [
        'date_order'=>$faker->dateTime,
        'address_order'=>$faker->address,
        'phone_order'=>$faker->phoneNumber,
        'total'=>$faker->numberBetween($min = 50, $max = 500000),
        'payment'=>$faker->numberBetween($min = 0, $max = 1),
        'status'=>$faker->numberBetween($min = 0, $max = 1),
        'user_id'=>$faker->randomElement($user_id)
    ];
});
