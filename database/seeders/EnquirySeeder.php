<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Enquiry::create([
                'name' => 'Name Enquiry ' . $i,
                'phone' => 'Phone Enquiry ' . $i,
                'email' => 'Email Enquiry ' . $i,
                'enquiring' => 'enquiring ' . $i,
                'message' => 'Message Enquiry ' . $i,
                'our_newsletter' => 'ya',

            ]);
        }
    }
}
