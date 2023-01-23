<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "super admin",
            'email' => "sadmin@admin.com",
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make("password"),
        ])->assignRole('super admin');

        User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
        ])->assignRole('admin');

        User::create([
            'name' => "user",
            'email' => "user@user.com",
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
        ])->assignRole('user');
    }
}
