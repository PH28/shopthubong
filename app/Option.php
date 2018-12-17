<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class option extends Model
{
    use SoftDeletes;
    protected $fillable=[
    	'name','option_group_id'
    ];
}
