<?php

namespace Database\Seeders;

use App\Models\ExperiencePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperiencePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            ExperiencePrice::create([
                'id_experience' => $i,
                'name_experience' => 'name_experience ' . $i,
                'price_experience' => $i * 10000,
                'unit_experience' => 'Unit ' . $i,
            ]);
        }
    }
}
