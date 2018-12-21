<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionGroup extends Model
{
     protected $fillable=[
    	'name'
    ];
    public function Options()
    {
        return $this->hasMany('App\Option');
    }
}
