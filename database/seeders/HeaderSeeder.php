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
        MenuHeader::create([
            'name_menu' => 'ABOUT',
            'image_header' => 'NO.JPG',
            'title_header' => '',
            'subtitle_header' => '',
        ]);
        MenuHeader::create([
            'name_menu' => 'EXPERIENCE',
            'image_header' => 'NO.JPG',
            'title_header' => '',
            'subtitle_header' => '',
        ]);
    }
}
