<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwal = [
            [
                'name' => 'Bimbel Privat SD',
                'guru_id' => 1,
                'hari_id' => 1,
                'mata_pelajaran_id' => 1,
                'jenjang_id' => 1,
                'waktu_mulai' => '08:00',
                'waktu_akhir' => '09:30',
                'harga' => 85000,
            ],
            [
                'name' => 'Bimbel Privat SD',
                'guru_id' => 1,
                'hari_id' => 2,
                'mata_pelajaran_id' => 1,
                'jenjang_id' => 1,
                'waktu_mulai' => '13:00',
                'waktu_akhir' => '14:30',
                'harga' => 75000,
            ],
            [
                'name' => 'Bimbel Privat SMP',
                'guru_id' => 2,
                'hari_id' => 1,
                'mata_pelajaran_id' => 2,
                'jenjang_id' => 2,
                'waktu_mulai' => '08:00',
                'waktu_akhir' => '09:30',
                'harga' => 85000,
            ],
            [
                'name' => 'Bimbel Privat SMP',
                'guru_id' => 2,
                'hari_id' => 2,
                'mata_pelajaran_id' => 2,
                'jenjang_id' => 2,
                'waktu_mulai' => '13:00',
                'waktu_akhir' => '14:30',
                'harga' => 75000,
            ],
            [
                'name' => 'Bimbel Privat SMA',
                'guru_id' => 3,
                'hari_id' => 1,
                'mata_pelajaran_id' => 3,
                'jenjang_id' => 3,
                'waktu_mulai' => '08:00',
                'waktu_akhir' => '09:30',
                'harga' => 85000,
            ],
            [
                'name' => 'Bimbel Privat SMA',
                'guru_id' => 3,
                'hari_id' => 2,
                'mata_pelajaran_id' => 3,
                'jenjang_id' => 3,
                'waktu_mulai' => '13:00',
                'waktu_akhir' => '14:30',
                'harga' => 75000,
            ],
        ];

        foreach ($jadwal as $item) {
            Jadwal::create($item);
        }
    }
}
