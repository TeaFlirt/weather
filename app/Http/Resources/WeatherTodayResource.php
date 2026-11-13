<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherTodayResource extends JsonResource
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
            'temperature' => $this->temperature,
            'feels_like' => $this->feels_like,
            'humidity' => $this->humidity,
            'pressure' => $this->pressure,
            'wind_speed' => $this->wind_speed,
            'wind_direction' => $this->wind_direction,
            'description' => $this->description,
            'icon' => $this->icon,
            'date' => $this->date->format('Y-m-d'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}