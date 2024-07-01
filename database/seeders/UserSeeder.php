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
            'email' => 'admin@admin.com',
            'date' => now(),
            'phone' => '085159079010',
            'address' => 'JLN. Ciwatu',
            'password' => bcrypt('password'),
        ]);

        // Menyisipkan beberapa data pengguna biasa menggunakan loop
        for ($i = 1; $i <= 9; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'date' => now(),
                'phone' => '08515907901' . $i,
                'address' => 'JLN. Ciwatu' . $i,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
