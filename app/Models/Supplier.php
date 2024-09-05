<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'company',
        'gender',
        'contact_no',
        'address',
        'created_by',
        'updated_by'
    ];
}
