<?php

namespace Database\Seeders;

use App\Models\CategoryNewsEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryNewsEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            CategoryNewsEvent::create([
                'name_category_news_event' => 'Category ' . $i,
            ]);
        }
    }
}
