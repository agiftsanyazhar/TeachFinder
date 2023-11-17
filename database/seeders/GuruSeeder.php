<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = [
            [
                'name' => 'Guru1',
                'email' => 'guru1@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/ijazah1.jpg',
                'user_id' => 2,
                'created_at' => '2023-10-19 03:47:27',
                'updated_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Guru2',
                'email' => 'guru2@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/ijazah2.jpg',
                'user_id' => 3,
                'created_at' => '2023-10-19 03:47:27',
                'updated_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Guru3',
                'email' => 'guru3@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/ijazah3.jpg',
                'user_id' => 4,
                'created_at' => '2023-10-19 03:47:27',
                'updated_at' => '2023-10-19 03:47:27',
            ],
            [
                'name' => 'Arani Syah',
                'email' => 'aranisyah06@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/' . Str::random(40) . '.jpg',
                'user_id' => 13,
                'created_at' => '29-10-2023 18:31:15',
                'updated_at' => '29-10-2023 18:31:15',
            ],
            [
                'name' => 'Rahmat Wijanarko',
                'email' => 'rahmatmjk@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/' . Str::random(40) . '.jpg',
                'user_id' => 14,
                'created_at' => '29-10-2023 18:45:05',
                'updated_at' => '29-10-2023 18:45:05',
            ],
            [
                'name' => 'Teguh Santoso',
                'email' => 'Teguh80083@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/' . Str::random(40) . '.jpg',
                'user_id' => 15,
                'created_at' => '29-10-2023 19:48:48',
                'updated_at' => '29-10-2023 19:48:48',
            ],
            [
                'name' => 'Achmad Harits Rizaaldo',
                'email' => 'bristleback160@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/' . Str::random(40) . '.jpg',
                'user_id' => 16,
                'created_at' => '29-10-2023 19:49:25',
                'updated_at' => '29-10-2023 19:49:25',
            ],
            [
                'name' => 'VANIA FEBRIANTI',
                'email' => 'vaniafebrianti06@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/' . Str::random(40) . '.jpg',
                'user_id' => 17,
                'created_at' => '29-10-2023 20:42:26',
                'updated_at' => '29-10-2023 20:42:26',
            ],
            [
                'name' => 'Nadya ayu',
                'email' => 'friscaxiaomi@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/' . Str::random(40) . '.jpg',
                'user_id' => 18,
                'created_at' => '30-10-2023 17:42:52',
                'updated_at' => '30-10-2023 17:42:52',
            ],
            [
                'name' => 'Savina Nur Inayah',
                'email' => 'savinanurinayah61@gmail.com',
                'phone' => '628' . rand(111111111, 999999999),
                'lokasi_id' => rand(1, 32),
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/' . Str::random(40) . '.jpg',
                'user_id' => 19,
                'created_at' => '31-10-2023 21:39:54',
                'updated_at' => '31-10-2023 21:39:54',
            ],
        ];

        foreach ($guru as $item) {
            Guru::create($item);
        }
    }
}
