<?php

namespace App\Http\Controllers;

use App\Models\WeatherWeekly;
use Illuminate\Http\Request;

class WeatherWeeklyController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->city_id) {
            $weekly = WeatherWeekly::where('city_id', auth()->user()->city_id)
                ->orderBy('date')
                ->get();
            $userCity = auth()->user()->city;
            return view('weather.weekly', compact('weekly', 'userCity'));
        }

        $weekly = WeatherWeekly::with('city')->orderBy('date')->get();
        return view('weather.weekly', compact('weekly'));
    }
}