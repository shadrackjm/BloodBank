<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBankStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'blood_bank_id',
        'blood_group_id',
        'amount',
    ];
}
