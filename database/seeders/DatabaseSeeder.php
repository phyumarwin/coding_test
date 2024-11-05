<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Seed 20 companies
        Company::factory(20)->create();

        // Seed 20 employees
        Employee::factory(50)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin999@gmail.com',
            'password' => bcrypt('Admin999@'),
            'role' => 'Admin',
        ]);
    }
}
