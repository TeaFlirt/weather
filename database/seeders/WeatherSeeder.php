<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\WeatherToday;
use App\Models\WeatherWeekly;
use Carbon\Carbon;

class WeatherSeeder extends Seeder
{
    public function run(): void
    {
        $cities = City::all();
        $descriptions = ['Ясно', 'Облачно', 'Дождь', 'Снег', 'Туман', 'Переменная облачность'];
        $days = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];

        foreach ($cities as $city) {
            // Погода на сегодня
            WeatherToday::create([
                'city_id' => $city->id,
                'temperature' => rand(-10, 30),
                'feels_like' => rand(-12, 28),
                'humidity' => rand(30, 90),
                'pressure' => rand(730, 770),
                'wind_speed' => rand(1, 15),
                'wind_direction' => ['С', 'Ю', 'В', 'З', 'СВ', 'ЮЗ'][rand(0, 5)],
                'description' => $descriptions[array_rand($descriptions)],
                'icon' => 'wi-day-sunny',
                'date' => Carbon::today(),
            ]);

            // Погода на неделю (7 дней)
            for ($i = 0; $i < 7; $i++) {
                $date = Carbon::today()->addDays($i);
                WeatherWeekly::create([
                    'city_id' => $city->id,
                    'day_of_week' => $days[$date->dayOfWeekIso - 1],
                    'date' => $date,
                    'temp_min' => rand(-15, 15),
                    'temp_max' => rand(15, 35),
                    'humidity' => rand(30, 90),
                    'wind_speed' => rand(1, 15),
                    'description' => $descriptions[array_rand($descriptions)],
                    'icon' => 'wi-day-sunny',
                ]);
            }
        }
    }
}