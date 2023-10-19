<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'secret_token' => '1hN5kQH1fT9N8I09F17ar4I7NjY8uwUjfZLK5L4Y',
                'last_login' => '2023-10-19 03:47:27',
                'last_logout' => '2023-10-19 13:47:27',
                'secret_link' => 'JBGiOJ1z8Vw2WBj5xbQPywqCHY3cr33U62lsx7t6',
                'secret_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'secret_token' => 'P5uo1eOImz7iIM795L4zgZlaMMJ1C77RYn65ie29',
                'last_login' => '2023-10-19 03:47:27',
                'last_logout' => '2023-10-19 13:47:27',
                'secret_link' => '53eI2Y4YE60uGsGzuQdxA1ovTIC0TDiRtZvQu761',
                'secret_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Siswa',
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
                'secret_token' => 'm4Bsf3Rb9XGqHKI4623KPl4Kr12x72SOQ92hpKdZ',
                'last_login' => '2023-10-19 03:47:27',
                'last_logout' => '2023-10-19 13:47:27',
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
                'secret_at' => '2023-10-19 03:47:27',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
