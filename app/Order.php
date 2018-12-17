<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use SoftDeletes;
    protected $fillable=[
    	'date_order','address_order','phone_order','total','payment','status','user_id'
    ];
}
