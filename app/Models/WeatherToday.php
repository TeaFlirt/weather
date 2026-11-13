<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeatherToday extends Model
{
    protected $table = 'weather_today';

    protected $fillable = [
        'city_id', 'temperature', 'feels_like', 'humidity',
        'pressure', 'wind_speed', 'wind_direction',
        'description', 'icon', 'date'
    ];

    protected $casts = [
        'date' => 'date',
        'temperature' => 'decimal:2',
        'feels_like' => 'decimal:2',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}