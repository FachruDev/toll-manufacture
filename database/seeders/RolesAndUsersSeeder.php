<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions
        $permAdmin = Permission::firstOrCreate(['name' => 'panel.admin.access']);
        $permCustomer = Permission::firstOrCreate(['name' => 'panel.customer.access']);
        $permManageUsers = Permission::firstOrCreate(['name' => 'manage.users']);

        // Roles
        $superadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $admin      = Role::firstOrCreate(['name' => 'admin']);
        $dephead    = Role::firstOrCreate(['name' => 'dephead']);
        $supervisor = Role::firstOrCreate(['name' => 'supervisor']);

        // Assign permissions to roles
        $superadmin->givePermissionTo([$permAdmin, $permCustomer, $permManageUsers]);
        $admin->givePermissionTo([$permAdmin, $permManageUsers]);
        $dephead->givePermissionTo([$permAdmin, $permManageUsers]);
        $supervisor->givePermissionTo([$permAdmin, $permManageUsers]);

        // Seed users
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@example.com', 'password' => 'password', 'role' => $superadmin],
            ['name' => 'Admin',       'email' => 'admin@example.com',       'password' => 'password', 'role' => $admin],
            ['name' => 'Dephead',     'email' => 'dephead@example.com',     'password' => 'password', 'role' => $dephead],
            ['name' => 'Supervisor',  'email' => 'supervisor@example.com',  'password' => 'password', 'role' => $supervisor],
        ];

        foreach ($users as $u) {
            /** @var User $user */
            $user = User::firstOrCreate(
                ['email' => $u['email']],
                ['name' => $u['name'], 'password' => Hash::make($u['password'])]
            );
            $user->syncRoles([$u['role']->name]);
        }

        // Ensure a customer profile exists for the customer user
        Customer::firstOrCreate(
            ['email' => 'customer@example.com'],
            ['name' => 'Customer One', 'company' => 'ACME Corp', 'phone' => '+62-812-0000-0000']
        );
    }
}
