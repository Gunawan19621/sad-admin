<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Experience::create([
                'title_experience' => 'Title Experience ' . $i,
                'subtitle_experience' => 'Subtitle Experience ' . $i,
                'description_experience' => 'Description Experience ' . $i,
            ]);
        }
    }
}