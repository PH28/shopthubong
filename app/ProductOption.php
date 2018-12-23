<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class ProductOption extends Model
{
      protected $fillable=[
    	'price_increase','product_id','option_id'
    ];
    public function Options()
    {
        return $this->belongsTo('App\Option');
    }
}
