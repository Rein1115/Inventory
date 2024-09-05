<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'trans_no',
        'product_id',
        'deliveredto',
        'address',
        'delivered_date',
        'quantity',
        'total_amount',
        'po_no',
        'terms',
        'deliveredby',
        'doctor_name',
        'contact_num',
        'or',
        'cr',
        'collected_by',
        'payment_status',
        'created_by',
        'updated_by'
    ];
    
}
