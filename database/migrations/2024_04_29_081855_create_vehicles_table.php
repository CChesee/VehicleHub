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
            $table->string('car_brand');
            $table->string('car_name');
            $table->string('car_type');
            $table->string('car_milage');
            $table->string('car_year_production');
            $table->string('car_tax');
            $table->string('car_service_fee');
            $table->string('car_fuel_type');
            $table->string('car_fuel_tank_capacity');
            $table->string('car_fuel_compsumtion');
            $table->string('car_transmition');
            $table->string('car_seat_capacity');
            $table->string('car_engine_capacity');
            $table->string('car_status');
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
