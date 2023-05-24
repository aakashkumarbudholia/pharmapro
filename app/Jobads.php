<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobads extends Model
{
    protected $table = 'job_post';
    protected $guarded = ['id'];
}
