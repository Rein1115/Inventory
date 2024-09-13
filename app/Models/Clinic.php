<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'contact_no',
        'clinic_name',
        'address',
        'zipcode',
        'created_by',
        'updated_by',
        'created_id'

    ];
}     