<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class product_option extends Model
{
    use SoftDeletes;
      protected $fillable=[
    	'price_increase','product_id','option_id'
    ];
}
