<?php

namespace Database\Seeders;

use App\Models\NewsEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            NewsEvent::create([
                'id_category_news_event' => $i,
                'image_news_event' => 'news_event' . $i . '.jpg',
                'title_news_event' => 'Title News Event ' . $i,
                'date_news_event' => '2021-01-0' . $i,
            ]);
        }
    }
}
