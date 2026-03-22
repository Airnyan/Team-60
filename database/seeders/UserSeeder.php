<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@test.com'], // Search criteria
            [
                'name' => 'Admin User',
                'phone' => '07123456789',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );


        if (User::count() <= 1) {
            User::factory()->count(5)->create();
        }
    }
}