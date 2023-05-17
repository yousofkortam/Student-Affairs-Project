<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('role_name', 'Admin')->first();

        $users = [
            [
                'username' => 'admin',
                'password' => bcrypt('123456789'),
                'first_name' => 'Yousof',
                'last_name' => 'Kortam',
                'email' => 'admin@gmail.com',
                'phone_number' => '01023697225',
                'address' => 'Shebien Elkowm, Menofia',
                'date_of_birth' => Carbon::now(),
                'role_id' => $role->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
