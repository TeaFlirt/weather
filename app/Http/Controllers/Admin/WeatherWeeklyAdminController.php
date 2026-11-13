<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\WeatherWeekly;
use Illuminate\Http\Request;

class WeatherWeeklyAdminController extends Controller
{
    public function index()
    {
        $records = WeatherWeekly::with('city')->paginate(15);
        return view('admin.weather-weekly.index', compact('records'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.weather-weekly.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'day_of_week' => 'required|string|max:10',
            'temp_min' => 'required|numeric',
            'temp_max' => 'required|numeric',
            'date' => 'required|date',
        ]);

        WeatherWeekly::create($request->all());
        return redirect()->route('admin.weather-weekly.index')->with('success', 'Запись добавлена!');
    }

    public function edit(WeatherWeekly $weatherWeekly)
    {
        $cities = City::all();
        return view('admin.weather-weekly.edit', compact('weatherWeekly', 'cities'));
    }

    public function update(Request $request, WeatherWeekly $weatherWeekly)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'day_of_week' => 'required|string|max:10',
            'temp_min' => 'required|numeric',
            'temp_max' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $weatherWeekly->update($request->all());
        return redirect()->route('admin.weather-weekly.index')->with('success', 'Запись обновлена!');
    }

    public function destroy(WeatherWeekly $weatherWeekly)
    {
        $weatherWeekly->delete();
        return redirect()->route('admin.weather-weekly.index')->with('success', 'Запись удалена!');
    }
}
