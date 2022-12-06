<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $primaryKey = 'id';
    protected $fillable = [
        'patientname','idMedic'
    ];

    public $timestamps = false;
}
