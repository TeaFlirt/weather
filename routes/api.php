<?php

use App\Http\Controllers\Api\WeatherTodayApiController;
use App\Http\Controllers\Api\WeatherWeeklyApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('weather')->group(function () {
    Route::apiResource('today', WeatherTodayApiController::class);
    Route::get('today/city/{cityId}', [WeatherTodayApiController::class, 'byCity']);
    
    Route::apiResource('weekly', WeatherWeeklyApiController::class);
    Route::get('weekly/city/{cityId}', [WeatherWeeklyApiController::class, 'byCity']);
});
