<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('weather_weekly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->string('day_of_week', 10);
            $table->date('date');
            $table->decimal('temp_min', 5, 2);
            $table->decimal('temp_max', 5, 2);
            $table->integer('humidity');
            $table->decimal('wind_speed', 5, 2);
            $table->string('description', 100);
            $table->string('icon', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weather_weekly');
    }
};