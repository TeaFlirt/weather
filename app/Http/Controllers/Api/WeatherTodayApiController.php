<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherTodayResource;
use App\Models\WeatherToday;
use Illuminate\Http\Request;

class WeatherTodayApiController extends Controller
{
    public function index()
    {
        $weather = WeatherToday::with('city')->paginate(15);
        return WeatherTodayResource::collection($weather);
    }

    public function show(WeatherToday $weatherToday)
    {
        return new WeatherTodayResource($weatherToday->load('city'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric',
            'feels_like' => 'nullable|numeric',
            'humidity' => 'nullable|integer',
            'pressure' => 'nullable|integer',
            'wind_speed' => 'nullable|numeric',
            'wind_direction' => 'nullable|string|max:50',
            'description' => 'required|string|max:100',
            'icon' => 'nullable|string|max:50',
            'date' => 'required|date',
        ]);

        $weather = WeatherToday::create($request->all());
        return new WeatherTodayResource($weather);
    }

    public function update(Request $request, WeatherToday $weatherToday)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric',
            'feels_like' => 'nullable|numeric',
            'humidity' => 'nullable|integer',
            'pressure' => 'nullable|integer',
            'wind_speed' => 'nullable|numeric',
            'wind_direction' => 'nullable|string|max:50',
            'description' => 'required|string|max:100',
            'icon' => 'nullable|string|max:50',
            'date' => 'required|date',
        ]);

        $weatherToday->update($request->all());
        return new WeatherTodayResource($weatherToday);
    }

    public function destroy(WeatherToday $weatherToday)
    {
        $weatherToday->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    // Доп. метод: погода по городу
    public function byCity($cityId)
    {
        $weather = WeatherToday::where('city_id', $cityId)->with('city')->get();
        return WeatherTodayResource::collection($weather);
    }
}