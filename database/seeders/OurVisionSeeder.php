<?php

namespace Database\Seeders;

use App\Models\OurVision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurVisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            OurVision::create([
                'image_vision' => 'vision' . $i . '.jpg',
                'title_vision' => 'Title Vision ' . $i,
                'description_vision' => 'Description Vision ' . $i,
            ]);
        }
    }
}
