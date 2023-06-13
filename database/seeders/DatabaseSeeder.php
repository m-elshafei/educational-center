<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Seeders\Role;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Company::factory(100)->create();
        \App\Models\Branch::factory(200)->create();
        // \App\Models\Employee::factory(100)->create();
        \App\Models\Maneger::factory(100)->create();
        \App\Models\Category::factory(100)->create();
        \App\Models\Vendor::factory(100)->create();
        \App\Models\Course::factory(100)->create();
        \App\Models\ClassRoom::factory(100)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            RoleSeeder::class
        ]);
    }
}
