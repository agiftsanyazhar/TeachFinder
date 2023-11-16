<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'secret_token' => "TCF" . Str::random(40),
                'visible_token' => '1hN5kQH1fT9N8I09F17ar4I7NjY8uwUjfZLK5L4Y',
                'last_login' => '2023-10-19 03:47:27',
                'last_logout' => '2023-10-19 13:47:27',
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
                'secret_at' => '2023-10-19 03:47:27',
                'secret_is_used' => 1,
            ],
            [
                'name' => 'Guru1',
                'email' => 'guru1@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'secret_token' => "TCF" . Str::random(40),
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
            ],
            [
                'name' => 'Guru2',
                'email' => 'guru2@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'secret_token' => "TCF" . Str::random(40),
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
            ],
            [
                'name' => 'Guru3',
                'email' => 'guru3@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => '2023-10-19 03:47:27',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'secret_token' => "TCF" . Str::random(40),
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
            ],
            [
                'name' => 'Agiftsany Azhar',
                'email' => 'agiftsanyazhar@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => '29-10-2023 12:13:36',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
                'secret_token' => "TCF" . Str::random(40),
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
                'created_at' => '29-10-2023 12:13:36',
                'updated_at' => '29-10-2023 12:13:36',
            ],
            [
                'name' => 'Cesil',
                'email' => 'sesiliasj@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => '29-10-2023 12:13:36',
                'password' => Hash::make('12345678'),
                'role_id' => 3,
                'secret_token' => "TCF" . Str::random(40),
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
                'created_at' => '29-10-2023 12:13:36',
                'updated_at' => '29-10-2023 12:13:36',
            ],
            [
                'name' => 'Ranidya',
                'email' => 'ranidyaputri02@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => '29-10-2023 14:47:13',
                'password' => Hash::make('apelpie123'),
                'role_id' => 3,
                'secret_token' => "TCF" . Str::random(40),
                'secret_link' => 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7',
                'created_at' => '29-10-2023 14:47:13',
                'updated_at' => '29-10-2023 14:47:13',
            ],
        ];

        foreach ($user as $item) {
            User::create($item);
        }
    }
}
