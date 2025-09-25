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
            'view-users', 'create-users', 'edit-users', 'delete-users', 'send-verifications-users',
            // Departments
            'view-departments', 'create-departments', 'edit-departments', 'delete-departments',
            // Permission Categories
            'view-permission-categories', 'create-permission-categories', 'edit-permission-categories', 'delete-permission-categories',
            // Permissions
            'view-permissions', 'create-permissions', 'edit-permissions', 'delete-permissions',
            // Customers
            'view-customers', 'create-customers', 'edit-customers', 'delete-customers', 'send-verifications-customers',
            // Roles
            'view-roles', 'create-roles', 'edit-roles', 'delete-roles',
            // Mail settings
            'view-mail', 'edit-mail',
            // TMR Invites
            'view-invite-tmr', 'create-invite-tmr', 'delete-invite-tmr',
            // TMR
            'change-status-tmr', 'view-tmr', 'create-tmr', 'edit-tmr', 'delete-tmr',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }
    }
}

