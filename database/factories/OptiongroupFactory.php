<?php

use Faker\Generator as Faker;

$factory->define(App\Option_group::class, function (Faker $faker) {
    return [
         'name'=>$faker->name
    ];
});
