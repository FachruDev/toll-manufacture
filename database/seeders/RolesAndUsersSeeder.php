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

        // Roles
        $superadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $admin      = Role::firstOrCreate(['name' => 'admin']);
        $dephead    = Role::firstOrCreate(['name' => 'dephead']);
        $supervisor = Role::firstOrCreate(['name' => 'supervisor']);
        $customer   = Role::firstOrCreate(['name' => 'customer']);

        // Assign permissions to roles
        $superadmin->givePermissionTo([$permAdmin, $permCustomer]);
        $admin->givePermissionTo($permAdmin);
        $dephead->givePermissionTo($permAdmin);
        $supervisor->givePermissionTo($permAdmin);
        $customer->givePermissionTo($permCustomer);

        // Seed users
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@example.com', 'password' => 'password', 'role' => $superadmin],
            ['name' => 'Admin',       'email' => 'admin@example.com',       'password' => 'password', 'role' => $admin],
            ['name' => 'Dephead',     'email' => 'dephead@example.com',     'password' => 'password', 'role' => $dephead],
            ['name' => 'Supervisor',  'email' => 'supervisor@example.com',  'password' => 'password', 'role' => $supervisor],
            ['name' => 'Customer One','email' => 'customer@example.com',    'password' => 'password', 'role' => $customer],
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
        $customerUser = User::where('email', 'customer@example.com')->first();
        if ($customerUser) {
            Customer::firstOrCreate(['user_id' => $customerUser->id], [
                'company' => 'ACME Corp',
                'phone' => '+62-812-0000-0000',
            ]);
        }
    }
}
