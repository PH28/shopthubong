<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=[
    	'name','description','price','quantity','kind','category_id'
    ];
    public function images()
    {
    	return $this->hasMany('App\Image');
    }
    public function orders()
    {
        return $this->hasMany('App\OrderDetail');
    }
    public function reviews()
    {
    	return $this->hasMany('App\Review');
    }
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
