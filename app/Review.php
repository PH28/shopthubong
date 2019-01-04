<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Review extends Model
{
    const APPROVE = 0;
    const UNAPPROVE = 1;

      protected $fillable=[
    	'review_text','status','user_id', 'product_id'
    ];
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
