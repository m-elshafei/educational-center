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
            'name_ar' => 'مصطفي',
            'email' => 'a@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(11111111),
            'role' => 'admin',
            'status' => 1,
            'created_at' => now(),
<<<<<<< HEAD
            'updated_at' => now(),
=======
            'updated_at' => now()
>>>>>>> 86187de0d1fe15bcc01f94444598b1256f4eb0af
        ]);
    }
}
