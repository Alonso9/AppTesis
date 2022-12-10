<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $primaryKey = 'id';
    protected $fillable = [
        'hour', 'date','idMedic', 'dob', 'socialNumber', 'status'
    ];

    public $timestamps = false;
}
