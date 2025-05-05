<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeographicCoverageSeeder extends Seeder
{
    public function run()
    {
        $geographicData = [
            'Lahore' => [
                'Kasur',
                'Lahore',
                'Nankana Sahib',
                'Sheikhupura'
            ],
            'Faisalabad' => [
                'Chiniot',
                'Faisalabad',
                'Jhang',
                'Toba Tek Singh'
            ],
            'Rawalpindi' => [
                'Attock',
                'Chakwal',
                'Jhelum',
                'Rawalpindi',
                'Murree',
                'Talagang'
            ],
            'Multan' => [
                'Khanewal',
                'Lodhran',
                'Multan',
                'Vehari'
            ],
            'Sargodha' => [
                'Bhakkar',
                'Khushab',
                'Mianwali',
                'Sargodha'
            ],
            'Gujranwala' => [
                'Gujranwala',
                'Gujrat',
                'Hafizabad',
                'Mandi Bahauddin',
                'Narowal',
                'Sialkot',
                'Wazirabad'
            ],
            'Bahawalpur' => [
                'Bahawalpur',
                'Bahawalnagar',
                'Rahim Yar Khan',
                'Taunsa',
                'Jampur'
            ],
            'Dera Ghazi Khan' => [
                'Dera Ghazi Khan',
                'Layyah',
                'Muzaffargarh',
                'Rajanpur'
            ]
        ];

        foreach ($geographicData as $division => $districts) {
            $divisionId = DB::table('divisions')->insertGetId([
                'name' => $division,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $districtData = array_map(function ($district) use ($divisionId) {
                return [
                    'name' => $district,
                    'division_id' => $divisionId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $districts);

            DB::table('districts')->insert($districtData);
        }
    }
} 