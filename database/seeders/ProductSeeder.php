<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'id_distributor' => $i,
                'id_category_product' => $i,
                'image_product' => 'product' . $i . '.jpg',
                'name_product' => 'Name Product ' . $i,
                'description_product' => 'Description Product ' . $i,
                'price_product' => '256' . $i,
                'stock_product' => '2001' . $i,
            ]);
        }
    }
}
