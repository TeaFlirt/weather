<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeatherWeekly extends Model
{
    protected $table = 'weather_weekly';

    protected $fillable = [
        'city_id', 'day_of_week', 'date', 'temp_min',
        'temp_max', 'humidity', 'wind_speed', 'description', 'icon'
    ];

    protected $casts = [
        'date' => 'date',
        'temp_min' => 'decimal:2',
        'temp_max' => 'decimal:2',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}