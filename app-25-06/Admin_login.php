<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_login extends Model
{
    protected $table = 'admin';
    protected $fillable = [
        'id','username','email','password','status'
    ];
}
