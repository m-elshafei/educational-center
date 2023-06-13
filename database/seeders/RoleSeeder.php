<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Contracts\Role;
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
>>>>>>> 86187de0d1fe15bcc01f94444598b1256f4eb0af

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'instructor',
                'guard_name ' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'student',
                'guard_name ' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]]
        );
=======
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermission();
        $arrayOfRoles = [

            'delete',
            'edit',
            'create',

        ];
        $permission = collect($arrayOfRoles)->map(function ($permission) {

            return ['name' => $permission, 'guard_name' => 'web'];
        });
        Permission::insert($permission->toArray());
        $role = Role::create(['name' => 'super admin'])->givePermissionTo($arrayOfRoles);
>>>>>>> 86187de0d1fe15bcc01f94444598b1256f4eb0af
    }
}
