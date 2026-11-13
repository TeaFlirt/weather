<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Администратор',
            'email' => 'admin@weather.ru',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'city_id' => 1, // Москва
        ]);

        // Тестовый пользователь
        User::create([
            'name' => 'Тестовый пользователь',
            'email' => 'user@weather.ru',
            'password' => Hash::make('password'),
            'role' => 'user',
            'city_id' => 2, // Санкт-Петербург
        ]);
    }
}