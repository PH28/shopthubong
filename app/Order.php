<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const APPROVE = 0;
    const UNAPPROVE = 1;
    const CANCEL = 2;
    protected $fillable=[
    	'date_order','address_order','phone_order','email_order','total','payment','status','user_id'
    ];
    public function orderdetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
    public function user()
   {
       return $this->belongsTo('App\User');
   }
}
