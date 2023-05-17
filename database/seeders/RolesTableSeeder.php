<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert(
            [
                'role_name' => 'Student',
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now'),
            ]
        );

        DB::table('roles')->insert(
            [
                'role_name' => 'Doctor',
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now'),
            ]
        );

        DB::table('roles')->insert(
            [
                'role_name' => 'Admin',
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now'),
            ]
        );
    }
}
