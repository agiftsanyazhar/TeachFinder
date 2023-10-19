<?php

namespace Database\Seeders;

use App\Models\Murid;
use Illuminate\Database\Seeder;

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
                'phone' => '6283193049563',
                'pin' => 710412,
                'jenjang_id' => 1,
                'alamat' => 'Tegalsari Nomor 1',
                'user_id' => 5,
            ],
            [
                'name' => 'Murid2',
                'email' => 'murid2@gmail.com',
                'phone' => '6283193049563',
                'pin' => 710412,
                'jenjang_id' => 2,
                'alamat' => 'Simokerto Nomor 1',
                'user_id' => 6,
            ],
            [
                'name' => 'Murid3',
                'email' => 'murid3@gmail.com',
                'phone' => '6283193049563',
                'pin' => 710412,
                'jenjang_id' => 3,
                'alamat' => 'Genteng Nomor 1',
                'user_id' => 7,
            ],
        ];

        foreach ($murid as $item) {
            Murid::create($item);
        }
    }
}
