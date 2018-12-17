<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product_option extends Model
{
      protected $fillable=[
    	'price_increase','product_id','option_id'
    ];
}
