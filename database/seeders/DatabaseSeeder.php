<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            IncomeSourcesTableSeeder::class,
            MonthlyIncomeRangeSeeder::class,
            OccupationSeeder::class,
            TelecomCompaniesSeeder::class,
            // ActivitySeeder::class,
            // EmploymentIncomeDetailsSeeder::class,
            // ExpertiesAreaSeeder::class,
            // FacilitySeeder::class,
            // GeographicCoverageSeeder::class,
            // WdcCollaborationSeeder::class,
            // WdcRolesSeeder::class,
        ]);

    }
}
