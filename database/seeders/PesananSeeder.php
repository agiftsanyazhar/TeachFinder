<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesanan = [
            [
                'murid_id' => 1,
                'guru_id' => 1,
                'jadwal_id' => 1,
                'status' => 1,
                'description' => 'Okee. Berang berang makan coklat. Brangkatt...',
            ],
            [
                'murid_id' => 2,
                'guru_id' => 2,
                'jadwal_id' => 2,
                'status' => 0,
                'description' => 'Lokasi?',
            ],
            [
                'murid_id' => 3,
                'guru_id' => 3,
                'jadwal_id' => 3,
                'status' => 1,
                'description' => 'Okee. Berang berang makan coklat. Brangkatt...',
            ],
            [
                'murid_id' => rand(1, 8),
                'guru_id' => rand(1, 10),
                'jadwal_id' => rand(1, 6),
                'status' => rand(0, 1),
            ],
            [
                'murid_id' => rand(1, 8),
                'guru_id' => rand(1, 10),
                'jadwal_id' => rand(1, 6),
                'status' => rand(0, 1),
            ],
            [
                'murid_id' => rand(1, 8),
                'guru_id' => rand(1, 10),
                'jadwal_id' => rand(1, 6),
                'status' => rand(0, 1),
            ],
            [
                'murid_id' => rand(1, 8),
                'guru_id' => rand(1, 10),
                'jadwal_id' => rand(1, 6),
                'status' => rand(0, 1),
            ],
            [
                'murid_id' => rand(1, 8),
                'guru_id' => rand(1, 10),
                'jadwal_id' => rand(1, 6),
                'status' => rand(0, 1),
            ],
            [
                'murid_id' => rand(1, 8),
                'guru_id' => rand(1, 10),
                'jadwal_id' => rand(1, 6),
                'status' => rand(0, 1),
            ],
            [
                'murid_id' => rand(1, 8),
                'guru_id' => rand(1, 10),
                'jadwal_id' => rand(1, 6),
                'status' => rand(0, 1),
            ],
        ];

        foreach ($pesanan as $item) {
            Pesanan::create($item);
        }
    }
}
