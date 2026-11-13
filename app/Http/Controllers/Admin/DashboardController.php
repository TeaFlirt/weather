<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Models\WeatherToday;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'cities' => City::count(),
            'today_records' => WeatherToday::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}