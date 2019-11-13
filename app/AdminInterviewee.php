<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInterviewee extends Model
{
   protected $table = 'user_interviewee';
   protected $guarded = ['id'];
}
