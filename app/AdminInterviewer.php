<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInterviewer extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];
}
