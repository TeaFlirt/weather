<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('weather_today', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->decimal('temperature', 5, 2);
            $table->decimal('feels_like', 5, 2)->nullable();
            $table->integer('humidity');
            $table->integer('pressure');
            $table->decimal('wind_speed', 5, 2);
            $table->string('wind_direction', 10)->nullable();
            $table->string('description', 100);
            $table->string('icon', 50)->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weather_today');
    }
};