<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['name' => 'Москва', 'country' => 'Россия', 'latitude' => 55.7558, 'longitude' => 37.6173],
            ['name' => 'Санкт-Петербург', 'country' => 'Россия', 'latitude' => 59.9343, 'longitude' => 30.3351],
            ['name' => 'Новосибирск', 'country' => 'Россия', 'latitude' => 55.0084, 'longitude' => 82.9357],
            ['name' => 'Екатеринбург', 'country' => 'Россия', 'latitude' => 56.8389, 'longitude' => 60.6057],
            ['name' => 'Казань', 'country' => 'Россия', 'latitude' => 55.7887, 'longitude' => 49.1221],
            ['name' => 'Лондон', 'country' => 'Великобритания', 'latitude' => 51.5074, 'longitude' => -0.1278],
            ['name' => 'Париж', 'country' => 'Франция', 'latitude' => 48.8566, 'longitude' => 2.3522],
            ['name' => 'Нью-Йорк', 'country' => 'США', 'latitude' => 40.7128, 'longitude' => -74.0060],
            ['name' => 'Токио', 'country' => 'Япония', 'latitude' => 35.6762, 'longitude' => 139.6503],
            ['name' => 'Берлин', 'country' => 'Германия', 'latitude' => 52.5200, 'longitude' => 13.4050],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}