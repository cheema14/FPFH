<?php

namespace Database\Seeders;

use App\Models\MonthlyIncomeRange;
use Illuminate\Database\Seeder;

class MonthlyIncomeRangeSeeder extends Seeder
{
    public function run()
    {
        $ranges_individual = [
            '0 - 25,000 PKR',
            '25,000 - 35,000 PKR',
            '35,000 - 45,000 PKR',
            '45,000 - 55,000 PKR',
            '55,000 - 65,000 PKR',
            '65,000 - 75,000 PKR',
            '75,000 - 85,000 PKR',
            '85,000 - 95,000 PKR',
            '95,000 - 100,000 PKR',
            '100,001 and Above PKR',
        ];

        $ranges_family = [
            '0 - 100,000 PKR',
            '100,000 - 200,000 PKR',
            '200,000 - 300,000 PKR',
            '300,000 - 400,000 PKR',
            '400,000 - 500,000 Above PKR',
        ];

        MonthlyIncomeRange::truncate();

        foreach ($ranges_individual as $range) {
            MonthlyIncomeRange::create(['range' => $range, 'income_type' => 1]);
        }

        foreach ($ranges_family as $range) {
            MonthlyIncomeRange::create(['range' => $range, 'income_type' => 2]);
        }
    }
}
