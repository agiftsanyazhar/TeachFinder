<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use App\Models\Murid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $murid = [
            [
                'name' => 'Murid1',
                'email' => 'murid1@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 5,
                'created_at' => '2023-10-19 03:47:27',
                'updated_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Murid2',
                'email' => 'murid2@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 6,
                'created_at' => '2023-10-19 03:47:27',
                'updated_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Murid3',
                'email' => 'murid3@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 7,
                'created_at' => '2023-10-19 03:47:27',
                'updated_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Agiftsany Azhar',
                'email' => 'agiftsanyazhar@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 8,
                'created_at' => '29-10-2023 12:13:36',
                'updated_at' => '29-10-2023 12:13:36',
            ],
            [
                'name' => 'Cesil',
                'email' => 'sesiliasj@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 9,
                'created_at' => '29-10-2023 12:13:36',
                'updated_at' => '29-10-2023 12:13:36',
            ],
            [
                'name' => 'Ranidya',
                'email' => 'ranidyaputri02@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 10,
                'created_at' => '29-10-2023 14:47:13',
                'updated_at' => '29-10-2023 14:47:13',
            ],
            [
                'name' => 'Valentino Harpa',
                'email' => 'valen.ginga@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 11,
                'created_at' => '29-10-2023 15:05:31',
                'updated_at' => '29-10-2023 15:05:31',
            ],
            [
                'name' => 'Bintang',
                'email' => 'Bintang@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'pin' => Hash::make(rand(111111, 999999)),
                'jenjang_id' => rand(1, 3),
                'alamat' => Lokasi::find(rand(1, 31))->name,
                'user_id' => 12,
                'created_at' => '29-10-2023 15:05:31',
                'updated_at' => '29-10-2023 15:05:31',
            ],
        ];

        foreach ($murid as $item) {
            Murid::create($item);
        }
    }
}
