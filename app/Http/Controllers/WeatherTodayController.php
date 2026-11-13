<?php

namespace App\Http\Controllers;

use App\Models\WeatherToday;
use Illuminate\Http\Request;

class WeatherTodayController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->city_id) {
            $weather = WeatherToday::where('city_id', auth()->user()->city_id)->first();
            $userCity = auth()->user()->city;
            return view('weather.today', compact('weather', 'userCity'));
        }

        $weathers = WeatherToday::with('city')->get();
        return view('weather.today', compact('weathers'));
    }
}