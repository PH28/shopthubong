<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=[
    	'name','description','price','quantity','kind','category_id'
    ];
    public function ProductOptions()
    {
        return $this->belongsTo('App\ProductOption);
    }
}
