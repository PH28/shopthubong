<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class image extends Model
{
    use SoftDeletes;
     protected $fillable=[
    	'url','image','product_id'
    ];
}
