<?php

namespace Database\Seeders;

use App\Models\OurStory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            OurStory::create([
                'image_story' => 'story' . $i . '.jpg',
                'title_story' => 'Title Story ' . $i,
                'description_story' => 'Description Story ' . $i,
                'year_story' => 2021 + $i,
            ]);
        }
    }
}
