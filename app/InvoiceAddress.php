<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceAddress extends Model
{
    protected $table = 'invoice_address';
    protected $guarded = ['id'];
}
