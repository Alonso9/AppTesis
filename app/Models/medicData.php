<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicData extends Model
{
    use HasFactory;
    protected $table = 'medic_data';
    protected $primaryKey = 'id';
    protected $fillable = [
        'medicId','license','specialty','status','lat','lng','description','numbre_phone','img','logo','univer'
    ];

    public $timestamps = false;
}
