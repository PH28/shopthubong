<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable=[
    	'name','option_group_id'
    ];
   public function OptionGroups()
   {
       return $this->belongsTo('App\OptionGroup');
   }
    public function ProductOptions()
    {
       return $this->hasMany('App\ProductOption'); 
    }
}
