<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
                'email_verified_at' => now(),
                'is_approved' => 1,
                'approved_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'DG Phata',
                'email' => 'dg.phata@azag.com',
                'password' => bcrypt('Azagphata@123'),
                'remember_token' => null,
                'email_verified_at' => now(),
                'is_approved' => 1,
                'approved_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Director Phata',
                'email' => 'director.phata@azag.com',
                'password' => bcrypt('Azagphata@123'),
                'remember_token' => null,
                'email_verified_at' => now(),
                'is_approved' => 1,
                'approved_at' => now(),
            ],
        ];

        User::insert($users);
    }
}
