<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    use HasFactory;
    protected $table = 'records';
    protected $primaryKey = 'id';
    protected $fillable = [
        'patientId', 'ethnicity', 'dob', 'surgeries', 'sex', 'familybackgr', 'diabetes', 'numbre_phone', 'broken_bones', 'blood_type' 	
    ];

    public $timestamps = false;
}
