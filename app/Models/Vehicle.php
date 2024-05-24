<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $vehicle_type
 * @property string $vehicle_brand
 * @property string $vehicle_name
 * @property string $vehicle_category
 * @property string $vehicle_location
 * @property int $vehicle_milage
 * @property string $vehicle_year_production
 * @property int $vehicle_tax
 * @property string $vehicle_service_fee
 * @property string $vehicle_fuel_type
 * @property int $vehicle_fuel_tank_capacity
 * @property int $vehicle_fuel_consumption
 * @property string $vehicle_transmition
 * @property int $vehicle_seat_capacity
 * @property int $vehicle_engine_capacity
 * @property string $vehicle_status
 * @property int $price
 * @property string $vehicle_cover_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Image> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleEngineCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleFuelConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleFuelTankCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleFuelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleMilage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleSeatCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleServiceFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleTransmition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereVehicleYearProduction($value)
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class, 'vehicle_id');
    }

}
