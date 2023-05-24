<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seos extends Model
{
    protected $table = 'seo_tags';
    protected $guarded = ['id'];
}
