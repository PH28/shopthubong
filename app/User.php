<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    //
    use Notifiable;
    protected $fillable = [
        'role_id', 'username','email','password','fullname',
        'dob','gender','phone','address','status'
    ];
    public function role()
   {
       return $this->belongsTo('App\Role');
   }
     public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}