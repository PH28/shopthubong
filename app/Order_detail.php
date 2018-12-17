<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order_detail extends Model
{
    use SoftDeletes;
    protected $fillable=[
    	'quantity','unit_price', 'order_id','product_id'
    ];
}
