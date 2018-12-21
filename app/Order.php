<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
    	'date_order','address_order','phone_order','total','payment','status','user_id'
    ];
    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
