<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
           'blood_group_id',
            'Name',
            'email' ,
            'age',
            'gender',
            'phone_number' ,
            'address',
            'amount',
            'price' ,
            'status' ,
    ];
}
