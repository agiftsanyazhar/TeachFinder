<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            HariSeeder::class,
            JenjangSeeder::class,
            LokasiSeeder::class,
            MataPelajaranSeeder::class,
            GuruSeeder::class,
            AlamatGuruSeeder::class,
            MuridSeeder::class,
            JadwalSeeder::class,
            PesananSeeder::class,
            TestimonialSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
