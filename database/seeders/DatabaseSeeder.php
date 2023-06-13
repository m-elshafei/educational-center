<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        \App\Models\Maneger::factory(100)->create();
        \App\Models\Category::factory(100)->create();
        \App\Models\Vendor::factory(100)->create();
        \App\Models\Course::factory(100)->create();
        \App\Models\ClassRoom::factory(100)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
