<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Award::create([
                'image_awards' => 'awards' . $i . '.jpg',
                'title_awards' => 'Title Awards ' . $i,
            ]);
        }
    }
}
