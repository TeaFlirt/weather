<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $cities = City::all();
        return view('profile.edit', compact('cities'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
        ]);

        auth()->user()->update([
            'city_id' => $request->city_id,
        ]);

        return redirect()->route('profile.edit')->with('success', 'Ваш город успешно изменен!');
    }
}