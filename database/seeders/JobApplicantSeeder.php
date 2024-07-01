<?php

namespace Database\Seeders;

use App\Models\JobApplicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            JobApplicant::create([
                'firstname' => 'firstname ' . $i,
                'lastname' => 'lastname' . $i,
                'email' => 'applicant' . $i . '@gmail.com',
                'question1' => 'question1' . $i,
                'question2' => 'question2' . $i,
                'cv_applicant' => 'cv' . $i . '.jpg',
            ]);
        }
    }
}
