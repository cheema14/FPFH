<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelecomCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('telecom_companies')->truncate();
        DB::table('telecom_companies')->insert([
            ['name' => 'Mobilink'],
            ['name' => 'Telenor'],
            ['name' => 'Ufone'],
            ['name' => 'Warid'],
            ['name' => 'Zong'],
        ]);
    }
}
