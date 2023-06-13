<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
