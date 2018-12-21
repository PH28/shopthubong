<?php

use Faker\Generator as Faker;

$factory->define(App\OptionGroup::class, function (Faker $faker) {
    return [
         'name'=>$faker->name
    ];
});
