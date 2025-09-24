<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Users
            'manage-users', 'create-users', 'edit-users', 'delete-users', 'send-verifications-users',
            // Permissions
            'view-permissions', 'create-permissions', 'edit-permissions', 'delete-permissions',
            // Customers
            'view-customers', 'create-customers', 'edit-customers', 'delete-customers', 'send-verifications-customers',
            // Roles
            'view-roles', 'create-roles', 'edit-roles', 'delete-roles',
            // Mail settings
            'view-mail', 'edit-mail',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }
    }
}

