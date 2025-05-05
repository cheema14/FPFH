<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;
class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            'Workshops',
            'Seminars',
            'Trainings',
            'Guest Talks and Lectures',
            'Mentoring Sessions',
            'Skill-building Sessions',
            'Awareness Campaigns',
            'Conferences'
        ];

        foreach ($activities as $activity) {
            Activity::create(['name' => $activity]);
        }
    }
}
