<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Front_manager extends Model
{
    protected $table = 'admin_login';
    protected $fillable = [
        'id','user_name','email','password','status'
    ];
}
