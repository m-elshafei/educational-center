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
        \App\Models\Branch::factory(200)->create();
        \App\Models\Category::factory(200)->create();
        \App\Models\ClassRoom::factory(200)->create();
        \App\Models\Company::factory(200)->create();
        \App\Models\Employee::factory(200)->create();
        \App\Models\Maneger::factory(200)->create();
        \App\Models\User::factory(200)->create();
        \App\Models\Vendor::factory(200)->create();
        \App\Models\Branch::factory(200)->create();
        \App\Models\Course::factory(200)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class
        ]);
    }
}
