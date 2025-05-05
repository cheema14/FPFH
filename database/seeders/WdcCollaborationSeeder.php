<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WdcCollaboration;

class WdcCollaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collaborations = [
            '1–5 WDCs',
            '6–10 WDCs',
            '11–15 WDCs',
            '16+ WDCs'
        ];

        foreach ($collaborations as $collaboration) {
            WdcCollaboration::create(['collaboration_range' => $collaboration]);
        }
    }
}
