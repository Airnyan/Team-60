<?php

namespace Database\Seeders;

use App\Models\UserAccessability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAccessabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAccessability::factory()->count(5)->create();
    }
}
