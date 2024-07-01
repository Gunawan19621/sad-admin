<?php

namespace Database\Seeders;

use App\Models\OurTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            OurTeam::create([
                'name_team' => 'Name Team ' . $i,
                'job_team' => 'Job Team ' . $i,
                'image_team' => 'team' . $i . '.jpg',
            ]);
        }
    }
}
