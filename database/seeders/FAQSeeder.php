<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            FAQ::create([
                'id_category_faq' => $i,
                'question_faq' => 'Question ' . $i,
                'answer_faq' => 'Answer ' . $i,
            ]);
        }
    }
}
