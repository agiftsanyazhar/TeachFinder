<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonial = [
            [
                'pengirim_id' => 5,
                'penerima_id' => 2,
                'description' => 'Mantapppp',
                'nilai' => 5,
            ],
            [
                'pengirim_id' => 5,
                'penerima_id' => 2,
                'description' => '⭐⭐⭐⭐⭐',
                'nilai' => 5,
            ],
            [
                'pengirim_id' => 5,
                'penerima_id' => 2,
                'description' => 'okeeee',
                'nilai' => 5,
            ],
        ];

        foreach ($testimonial as $item) {
            Testimonial::create($item);
        }
    }
}
