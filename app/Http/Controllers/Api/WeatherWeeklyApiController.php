<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherWeeklyResource;
use App\Models\WeatherWeekly;
use Illuminate\Http\Request;

class WeatherWeeklyApiController extends Controller
{
    public function index()
    {
        $weather = WeatherWeekly::with('city')->orderBy('date')->paginate(15);
        return WeatherWeeklyResource::collection($weather);
    }

    public function show(WeatherWeekly $weatherWeekly)
    {
        return new WeatherWeeklyResource($weatherWeekly->load('city'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'day_of_week' => 'required|string|max:10',
            'date' => 'required|date',
            'temp_min' => 'required|numeric',
            'temp_max' => 'required|numeric',
            'humidity' => 'nullable|integer',
            'wind_speed' => 'nullable|numeric',
            'description' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:50',
        ]);

        $weather = WeatherWeekly::create($request->all());
        return new WeatherWeeklyResource($weather);
    }

    public function update(Request $request, WeatherWeekly $weatherWeekly)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'day_of_week' => 'required|string|max:10',
            'date' => 'required|date',
            'temp_min' => 'required|numeric',
            'temp_max' => 'required|numeric',
            'humidity' => 'nullable|integer',
            'wind_speed' => 'nullable|numeric',
            'description' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:50',
        ]);

        $weatherWeekly->update($request->all());
        return new WeatherWeeklyResource($weatherWeekly);
    }

    public function destroy(WeatherWeekly $weatherWeekly)
    {
        $weatherWeekly->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    // Доп. метод: погода по городу
    public function byCity($cityId)
    {
        $weather = WeatherWeekly::where('city_id', $cityId)
            ->with('city')
            ->orderBy('date')
            ->get();
        return WeatherWeeklyResource::collection($weather);
    }
}