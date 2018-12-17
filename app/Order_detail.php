<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Order_detail extends Model
{
    protected $fillable=[
    	'quantity','unit_price', 'order_id','product_id'
    ];
}
