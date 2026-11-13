<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $cities = City::with('weatherToday')->take(6)->get();
        return view('welcome', compact('cities'));
    }
}