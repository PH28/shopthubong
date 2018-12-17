<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Review extends Model
{
     use SoftDeletes;
      protected $fillable=[
    	'review_text','status','option_id','user_id', 'product_id'
    ];
}
