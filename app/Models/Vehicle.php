<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'condition',
        'transmission',
        'vehicle_type',
        'engine',
        'cylinder',
        'doors',
        'fuel_type',
        'vin',
    ];
}
