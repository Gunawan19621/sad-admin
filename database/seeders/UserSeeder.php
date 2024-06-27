<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin System',
            'email' => 'admin@gmail.com',
            'date' => now(),
            'phone' => '085159079010',
            'address' => 'JLN. Ciwatu',
            'password' => bcrypt('password'),
        ]);
    }
}
