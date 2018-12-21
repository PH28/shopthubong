<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionGroup extends Model
{
     protected $fillable=[
    	'name'
    ];
    public function Option()
    {
        return $this->hasMany('App\Option');
    }
}
