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
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
     public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}