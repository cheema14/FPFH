<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WdcRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['id'    => 3,'title' => 'University']);

        // Create Civil Society Organizations (CSOs) role
        Role::create(['id'    => 4,'title' => 'CSOs']);
    }
}
