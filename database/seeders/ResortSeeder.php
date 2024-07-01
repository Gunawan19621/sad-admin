<?php

namespace Database\Seeders;

use App\Models\Resort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Resort::create([
                'title_resort' => 'title_resort ' . $i,
                'subtitle_resort' => 'subtitle_resort' . $i,
                'description_resort' => 'description_resort' . $i,
            ]);
        }
    }
}
