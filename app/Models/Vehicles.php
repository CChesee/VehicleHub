<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_brand',
        'car_name',
        'car_type',
        'car_milage',
        'car_year_production',
        'car_tax',
        'car_service_fee',
        'car_fuel_type',
        'car_fuel_tank_capacity',
        'car_fuel_compsumtion',
        'car_transmition',
        'car_seat_capacity',
        'car_engine_capacity',
        'car_status',
        'price',
        'image'

    ];

    public function userProduct(){
        return $this->hasMany(UserProduct::class);
    }
}

