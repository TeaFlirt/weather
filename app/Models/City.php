<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = ['name', 'country', 'latitude', 'longitude'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function weatherToday(): HasMany
    {
        return $this->hasMany(WeatherToday::class);
    }

    public function weatherWeekly(): HasMany
    {
        return $this->hasMany(WeatherWeekly::class);
    }
}