<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExpertiseArea;
class ExpertiesAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            'Capacity Building and Training',
            'Leadership Development',
            'Entrepreneurship and Business Skills',
            'Legal Rights and Advocacy',
            'Health and Wellness',
            'Gender Equality and Women\'s Empowerment',
            'Technology and Digital Literacy',
            'Public Speaking and Communication Skills',
            'Mental Health and Counseling',
            'Nutrition, WASH, MHM',
        ];

        foreach ($areas as $area) {
            ExpertiseArea::create(['name' => $area]);
        }
    }
}
