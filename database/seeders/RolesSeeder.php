<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['superadmin','admin','dephead','supervisor'];
        foreach ($roles as $name) {
            Role::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        // Superadmin gets all permissions
        $superadmin = Role::where('name','superadmin')->first();
        if ($superadmin) {
            $superadmin->syncPermissions(Permission::pluck('name')->all());
        }
    }
}

