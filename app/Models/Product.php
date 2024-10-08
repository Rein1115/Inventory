<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'supplier_name',
        'expiration_date',
        'original_price',
        'selling_price',
        'status',
        'brand_name',
        'quantity',
        'originalquan',
        'unit',
        'created_by',
        'updated_by',
        'created_id'
    ];
}
