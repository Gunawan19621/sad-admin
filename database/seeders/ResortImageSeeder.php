<?php

namespace Database\Seeders;

use App\Models\ResortImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResortImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            ResortImage::create([
                'id_resort' => $i,
                'image_resort' => 'resort' . $i . '.jpg',
            ]);
        }
    }
}