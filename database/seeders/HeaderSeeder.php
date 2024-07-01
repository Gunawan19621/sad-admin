<?php

namespace Database\Seeders;

use App\Models\MenuHeader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menyisipkan beberapa data pengguna biasa menggunakan loop
        for ($i = 1; $i <= 10; $i++) {
            MenuHeader::create([
                'name_menu' => 'Menu ' . $i,
                'image_header' => 'image' . $i . '.jpg',
                'title_header' => 'Title ' . $i,
                'subtitle_header' => 'Subtitle ' . $i,
            ]);
        }
    }
}
