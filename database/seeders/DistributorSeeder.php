<?php

namespace Database\Seeders;

use App\Models\OurDistributor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            OurDistributor::create([
                'name_distributor' => 'Name Distributor ' . $i,
                'image_distributor' => 'Image Distributor ' . $i,
                'address_distributor' => 'Address Distributor ' . $i,
                'name_person_distributor' => 'Name Person Distributor ' . $i,
                'phone_distributor' => 'Phone Distributor ' . $i,
            ]);
        }
    }
}