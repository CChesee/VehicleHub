<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_brand');
            $table->string('vehicle_name');
            $table->string('vehicle_type');
            $table->string('vehicle_milage');
            $table->string('vehicle_year_production');
            $table->string('vehicle_tax');
            $table->string('vehicle_service_fee');
            $table->string('vehicle_fuel_type');
            $table->string('vehicle_fuel_tank_capacity');
            $table->string('vehicle_fuel_compsumtion');
            $table->string('vehicle_transmition');
            $table->string('vehicle_seat_capacity');
            $table->string('vehicle_engine_capacity');
            $table->string('vehicle_status');
            $table->unsignedBigInteger('price');
            $table->string('image');
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
