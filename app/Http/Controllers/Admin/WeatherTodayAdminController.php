<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\WeatherToday;
use Illuminate\Http\Request;

class WeatherTodayAdminController extends Controller
{
    public function index()
    {
        $records = WeatherToday::with('city')->paginate(15);
        return view('admin.weather-today.index', compact('records'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.weather-today.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric',
            'description' => 'required|string|max:100',
            'date' => 'required|date',
        ]);

        WeatherToday::create($request->all());
        return redirect()->route('admin.weather-today.index')->with('success', 'Запись добавлена!');
    }

    public function edit(WeatherToday $weatherToday)
    {
        $cities = City::all();
        return view('admin.weather-today.edit', compact('weatherToday', 'cities'));
    }

    public function update(Request $request, WeatherToday $weatherToday)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric',
            'description' => 'required|string|max:100',
            'date' => 'required|date',
        ]);

        $weatherToday->update($request->all());
        return redirect()->route('admin.weather-today.index')->with('success', 'Запись обновлена!');
    }

    public function destroy(WeatherToday $weatherToday)
    {
        $weatherToday->delete();
        return redirect()->route('admin.weather-today.index')->with('success', 'Запись удалена!');
    }
}
