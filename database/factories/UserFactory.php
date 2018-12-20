<?php

use Faker\Generator as Faker;
use App\Role;
$factory->define(App\User::class, function (Faker $faker) {
    $roleIds = Role::pluck('id');
    $genders = array('1','2','3');
    return [
        //
        'role_id' => $faker -> randomElement($roleIds),
        'username' => $faker ->userName,
		'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
		'fullname' => $faker ->name,
		'gender' => $faker -> randomElement($genders),
		'email' => $faker ->email,
		'dob' => $faker ->date($format = 'Y-m-d', $max = 'now'),
		'address' => $faker ->address,
		'phone' => $faker ->phoneNumber,
		'status' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
