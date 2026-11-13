<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WeatherTodayController;
use App\Http\Controllers\WeatherWeeklyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WeatherTodayAdminController;
use App\Http\Controllers\Admin\WeatherWeeklyAdminController;
use App\Http\Controllers\Admin\CityAdminController;
use App\Http\Controllers\Admin\UserAdminController;

// Главная страница
Route::get('/', [WelcomeController::class, 'index'])->name('home');

// Погода на сегодня
Route::get('/weather/today', [WeatherTodayController::class, 'index'])->name('weather.today');

// Погода на неделю
Route::get('/weather/weekly', [WeatherWeeklyController::class, 'index'])->name('weather.weekly');

// Маршруты для авторизованных пользователей
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
});

// Маршрут /admin - перебрасывает на админ-панель
Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    abort(403, 'Доступ запрещен');
})->middleware('auth')->name('admin.redirect');

// Админ-панель
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('weather-today', WeatherTodayAdminController::class);
    Route::resource('weather-weekly', WeatherWeeklyAdminController::class);
    Route::resource('cities', CityAdminController::class);
    Route::get('users', [UserAdminController::class, 'index'])->name('users.index');
    Route::put('users/{user}/role', [UserAdminController::class, 'updateRole'])->name('users.updateRole');
});
// API Routes (временное решение)
Route::prefix('api')->group(function () {
    Route::get('weather/today', [App\Http\Controllers\Api\WeatherTodayApiController::class, 'index']);
    Route::get('weather/today/{id}', [App\Http\Controllers\Api\WeatherTodayApiController::class, 'show']);
    Route::post('weather/today', [App\Http\Controllers\Api\WeatherTodayApiController::class, 'store']);
    Route::put('weather/today/{id}', [App\Http\Controllers\Api\WeatherTodayApiController::class, 'update']);
    Route::delete('weather/today/{id}', [App\Http\Controllers\Api\WeatherTodayApiController::class, 'destroy']);
    Route::get('weather/today/city/{cityId}', [App\Http\Controllers\Api\WeatherTodayApiController::class, 'byCity']);
    
    Route::get('weather/weekly', [App\Http\Controllers\Api\WeatherWeeklyApiController::class, 'index']);
    Route::get('weather/weekly/{id}', [App\Http\Controllers\Api\WeatherWeeklyApiController::class, 'show']);
    Route::post('weather/weekly', [App\Http\Controllers\Api\WeatherWeeklyApiController::class, 'store']);
    Route::put('weather/weekly/{id}', [App\Http\Controllers\Api\WeatherWeeklyApiController::class, 'update']);
    Route::delete('weather/weekly/{id}', [App\Http\Controllers\Api\WeatherWeeklyApiController::class, 'destroy']);
    Route::get('weather/weekly/city/{cityId}', [App\Http\Controllers\Api\WeatherWeeklyApiController::class, 'byCity']);
});
