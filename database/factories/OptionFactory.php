<?php

use Faker\Generator as Faker;
use App\OptionGroup;

$factory->define(App\Option::class, function (Faker $faker) {
	$option_group_id = OptionGroup::pluck('id');
    return [
       'name'=>$faker->name,
       'option_group_id'=>$faker->randomElement($option_group_id)
    ];
});
