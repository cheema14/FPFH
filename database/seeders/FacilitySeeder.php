<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            'Physical Venue (for in-person events)',
            'Online Platforms (for virtual events)',
            'Guest Speakers or Trainers',
            'Printed Materials and Resources',
            'Technical Support (for webinars, live sessions)',
            'Sponsorships or Funding for Activities'
        ];

        foreach ($facilities as $facility) {
            Facility::create(['name' => $facility]);
        }
    }
}
