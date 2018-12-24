<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable=[
    	'name','description','parent_id'
    ];
    public function products()
    {
    	return $this->hasMany('App\Product');
    }
     public function parent()
    {
    	return $this->belongsTo('App\Category','id','parent_id');
    }
    public function childs()
    {
        return $this->hasMany('App\Category','parent_id','id');
    }
}
