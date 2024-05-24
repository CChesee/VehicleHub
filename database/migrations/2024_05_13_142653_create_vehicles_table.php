<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('vehicle_type');
            $table->string('vehicle_brand');
            $table->string('vehicle_name');
            $table->string('vehicle_category');
            $table->string('vehicle_location');
            $table->unsignedBigInteger('vehicle_milage');
            $table->string('vehicle_year_production');
            $table->unsignedBigInteger('vehicle_tax');
            $table->string('vehicle_service_fee');
            $table->string('vehicle_fuel_type');
            $table->unsignedBigInteger('vehicle_fuel_tank_capacity');
            $table->unsignedBigInteger('vehicle_fuel_consumption');
            $table->string('vehicle_transmition');
            $table->unsignedBigInteger('vehicle_seat_capacity');
            $table->unsignedBigInteger('vehicle_engine_capacity');
            $table->string('vehicle_status');
            $table->unsignedBigInteger('price');
            $table->string('vehicle_cover_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
