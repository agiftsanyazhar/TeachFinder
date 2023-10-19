<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokasi = [
            ['name' => 'Tegalsari'],
            ['name' => 'Simokerto'],
            ['name' => 'Genteng'],
            ['name' => 'Bubutan'],
            ['name' => 'Gubeng'],
            ['name' => 'Gunung Anyar'],
            ['name' => 'Sukolilo'],
            ['name' => 'Tambaksari'],
            ['name' => 'Mulyorejo'],
            ['name' => 'Rungkut'],
            ['name' => 'Tenggilis Mejoyo'],
            ['name' => 'Benowo'],
            ['name' => 'Pakal'],
            ['name' => 'Asemrowo'],
            ['name' => 'Sukomanunggal'],
            ['name' => 'Tandes'],
            ['name' => 'Sambikecep'],
            ['name' => 'Lakarsantri'],
            ['name' => 'Bulak'],
            ['name' => 'Kenjeran'],
            ['name' => 'Semampir'],
            ['name' => 'Pabean Cantian'],
            ['name' => 'Krembangan'],
            ['name' => 'Wonokromo'],
            ['name' => 'Wonocolo'],
            ['name' => 'Wiyung'],
            ['name' => 'Karang Pilang'],
            ['name' => 'Jambangan'],
            ['name' => 'Gayungan'],
            ['name' => 'Dukuh Pakis'],
            ['name' => 'Sawahan'],
        ];

        foreach ($lokasi as $item) {
            Lokasi::create($item);
        }
    }
}
