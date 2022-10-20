<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'hour', 'date','idMedic'
    ];

    public $timestamps = false;
}
