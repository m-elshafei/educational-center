<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            'name' => 'moustafa',
            'password' => Hash::make(11111111),
            'role' => 'admin',
            'email' => 'a@mail.com',
            'created_at' => now(),
        ]);
    }
}
