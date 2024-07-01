<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            ContactUs::create([
                'address' => 'Address ' . $i,
                'operating_hours' => 'Operating Hours ' . $i,
                'email' => 'email' . $i . '@example.com',
                'phone' => 'Phone ' . $i,
                'fax' => 'Fax ' . $i,
                'social_media' => json_encode([
                    'facebook' => 'Facebook ' . $i,
                    'instagram' => 'Instagram ' . $i,
                    'twitter' => 'Twitter ' . $i,
                ]),
                'google_maps' => json_encode([
                    'latitude' => 'Latitude ' . $i,
                    'longitude' => 'Longitude ' . $i,
                ]),
            ]);
        }
    }
}
