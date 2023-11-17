<?php

namespace Database\Seeders;

use App\Models\AlamatGuru;
use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class AlamatGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alamat = [
            [
                'guru_id' => 1,
                'alamat' => 'Tegalsari Nomor 1',
            ],
            [
                'guru_id' => 1,
                'alamat' => 'Tegalsari Nomor 2',
            ],
            [
                'guru_id' => 2,
                'alamat' => 'Simokerto Nomor 1',
            ],
            [
                'guru_id' => 2,
                'alamat' => 'Simokerto Nomor 2',
            ],
            [
                'guru_id' => 3,
                'alamat' => 'Genteng Nomor 1',
            ],
            [
                'guru_id' => 3,
                'alamat' => 'Genteng Nomor 2',
            ],
            [
                'guru_id' => rand(1, 10),
                'alamat' => Lokasi::find(rand(1, 31))->name,
            ],
            [
                'guru_id' => rand(1, 10),
                'alamat' => Lokasi::find(rand(1, 31))->name,
            ],
            [
                'guru_id' => rand(1, 10),
                'alamat' => Lokasi::find(rand(1, 31))->name,
            ],
            [
                'guru_id' => rand(1, 10),
                'alamat' => Lokasi::find(rand(1, 31))->name,
            ],
            [
                'guru_id' => rand(1, 10),
                'alamat' => Lokasi::find(rand(1, 31))->name,
            ],
            [
                'guru_id' => rand(1, 10),
                'alamat' => Lokasi::find(rand(1, 31))->name,
            ],
        ];

        foreach ($alamat as $item) {
            AlamatGuru::create($item);
        }
    }
}
