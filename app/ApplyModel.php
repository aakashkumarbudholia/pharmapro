<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyModel extends Model
{
    protected $table = 'apply_job';
    protected $guarded = ['id'];
}
