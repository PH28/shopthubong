<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable=[
    	'name','option_group_id'
    ];
   public function OptionGroup()
   {
       reuturn $this->belongsTo('App\OptionGroup');
   }
}
