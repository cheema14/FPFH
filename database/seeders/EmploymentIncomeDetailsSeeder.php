<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentIncomeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Arts and Design',
            'Education',
            'Finance and Business',
            'Government and Public Administration',
            'Healthcare',
            'Hospitality and Service',
            'Information Technology',
            'Legal',
            'Media and Communication',
            'Retail and Sales',
            'Science and Research',
            'Trades and Technical',
            'Others',
        ];

        foreach ($categories as $category) {
            DB::table('employment_income_details')->insert([
                'category' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
