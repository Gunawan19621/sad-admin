<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Partner::create([
                'name_partner' => 'Name Partner ' . $i,
                'image_partner' => 'partner' . $i . '.jpg',
            ]);
        }
    }
}