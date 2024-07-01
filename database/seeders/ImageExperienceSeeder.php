<?php

namespace Database\Seeders;

use App\Models\ImageExperience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            ImageExperience::create([
                'id_experience' => $i,
                'image_experience' => 'experience' . $i . '.jpg',
            ]);
        }
    }
}
