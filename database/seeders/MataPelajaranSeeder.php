<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mataPelajaran = [
            ['name' => 'Bahasa Indonesia'],
            ['name' => 'Matematika'],
            ['name' => 'Bahasa Inggris'],
            ['name' => 'Ilmu Pengetahuan Alam (IPA)'],
            ['name' => 'Ilmu Pengetahuan Sosial (IPS)'],
            ['name' => 'Pendidikan Kewarganegaraan (PKn)'],
            ['name' => 'Pendidikan Agama'],
            ['name' => 'Seni dan Budaya'],
            ['name' => 'Pendidikan Jasmani'],
            ['name' => 'Fisika'],
            ['name' => 'Kimia'],
            ['name' => 'Biologi'],
            ['name' => 'Sejarah'],
            ['name' => 'Geografi'],
            ['name' => 'Ekonomi'],
            ['name' => 'Prakarya'],
        ];

        foreach ($mataPelajaran as $item) {
            MataPelajaran::create($item);
        }
    }
}
