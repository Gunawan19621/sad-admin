<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\OurStorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HeaderSeeder::class,
            OurStorySeeder::class,
            OurTeamSeeder::class,
            OurVisionSeeder::class,
            AwardSeeder::class,
            CategoryFAQSeeder::class,
            FAQSeeder::class,
            ContactUsSeeder::class,
            ExperienceSeeder::class,
            ImageExperienceSeeder::class,
            ExperiencePriceSeeder::class,
            // CategoryProductSeeder::class,
            // DistributorSeeder::class,
            // ProductSeeder::class,
            // PartnerSeeder::class,
            // CategoryNewsEventSeeder::class,
            // NewsEventSeeder::class,
            // JobApplicantSeeder::class,
            // ResortSeeder::class,
            // ResortImageSeeder::class,
            // EnquirySeeder::class,
        ]);
    }
}
