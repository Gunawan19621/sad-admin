<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            CategoryProduct::create([
                'name_category_product' => 'Category ' . $i,
                'description_category_product' => 'Description Category ' . $i,
            ]);
        }
    }
}