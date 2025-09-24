<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            PermissionsSeeder::class,
            PermissionCategoriesSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            EmailConfigSeeder::class,
        ]);
    }
}
