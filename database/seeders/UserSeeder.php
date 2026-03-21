<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'phone' => '07123456789',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::factory()->count(5)->create();
    }
}