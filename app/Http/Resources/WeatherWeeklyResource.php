<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherWeeklyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'city' => [
                'id' => $this->city->id,
                'name' => $this->city->name,
                'country' => $this->city->country,
            ],
            'day_of_week' => $this->day_of_week,
            'date' => $this->date->format('Y-m-d'),
            'temp_min' => $this->temp_min,
            'temp_max' => $this->temp_max,
            'humidity' => $this->humidity,
            'wind_speed' => $this->wind_speed,
            'description' => $this->description,
            'icon' => $this->icon,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}