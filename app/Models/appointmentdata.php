<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointmentdata extends Model
{
    use HasFactory;
    protected $table = 'appointmentdata';
    protected $primaryKey = 'id';
    protected $fillable = [
        'matter', 'description', 	'blood_pressure', 	'weight', 	'height', 	'medicine', 	'finaldescription', 	'idAppointment' 
    ];
}
