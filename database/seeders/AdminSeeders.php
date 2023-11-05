<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create an admin user
         user::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        // Create a regular user
        User::create([
            'name' => 'Shankar',
            'email' => 'shankar@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 0,
        ]);
    }
}
