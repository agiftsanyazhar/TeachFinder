<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenjang = [
            ['name' => 'SD'],
            ['name' => 'SMP'],
            ['name' => 'SMA'],
        ];

        foreach ($jenjang as $item) {
            Jenjang::create($item);
        }
    }
}
