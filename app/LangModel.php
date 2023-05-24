<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LangModel extends Model
{
    protected $table = 'language';
    protected $guarded = ['id'];
}
