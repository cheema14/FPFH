<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    public function run()
    {
        $occupations = [
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
            'Unemployed',
        ];
        Occupation::truncate();
        foreach ($occupations as $occupation) {
            Occupation::create(['name' => $occupation]);
        }
    }
}
