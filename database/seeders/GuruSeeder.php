<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

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
                'phone' => '6283193049563',
                'lokasi_id' => 1,
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/ijazah1.jpg',
                'user_id' => 2,
            ],
            [
                'name' => 'Guru2',
                'email' => 'guru2@gmail.com',
                'phone' => '6283193394201',
                'lokasi_id' => 2,
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/ijazah2.jpg',
                'user_id' => 3,
            ],
            [
                'name' => 'Guru3',
                'email' => 'guru3@gmail.com',
                'phone' => '6283193192831',
                'lokasi_id' => 3,
                'is_verified' => 1,
                'skl_ijazah' => 'uploads/gurus/skl_ijazah/ijazah3.jpg',
                'user_id' => 4,
            ],
        ];

        foreach ($guru as $item) {
            Guru::create($item);
        }
    }
}
