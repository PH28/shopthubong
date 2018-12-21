<?php

use Faker\Generator as Faker;
use App\Order;
use App\Product;
$factory->define(App\OrderDetail::class, function (Faker $faker) {
	$orderid = Order::pluck('id');
	$productid =  Product::pluck('id');
    return [
        'quantity'=>$faker->numberBetween($min = 5, $max = 10),
        'unit_price'=>$faker->numberBetween($min = 50, $max = 500), 
        'order_id'=>$faker->randomElement($orderid),
        'product_id'=>$faker->randomElement($productid)
    ];
});
