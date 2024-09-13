<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_transno',
        'payment',
        'payment_mode',
        'number',
        'pay_date',
        'created_by',
        'updated_by',
        'created_id'
    ];
}
