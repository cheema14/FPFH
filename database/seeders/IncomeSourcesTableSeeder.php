<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeSourcesTableSeeder extends Seeder
{
    public function run()
    {
        // Define the income sources
        $incomeSources = [
            ['name' => 'Salary'],
            ['name' => 'Business'],
            ['name' => 'Daily Wages'],
            ['name' => 'Pension'],
            ['name' => 'Other'],
        ];
        DB::table('income_sources')->truncate();
        // Insert the income sources into the database
        DB::table('income_sources')->insert($incomeSources);
    }
}
