<?php

namespace Database\Seeders;

use App\Models\PermissionCategory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $map = [
            'management-users' => [
                'label' => 'Permission Crud User',
                'description' => 'Semua permission untuk manajemen user',
                'sort' => 10,
                'perms' => [
                    'manage-users','create-users','edit-users','delete-users','send-verifications-users',
                ],
            ],
            'management-permissions' => [
                'label' => 'Permission Crud Permission',
                'description' => 'Semua permission untuk manajemen permission',
                'sort' => 20,
                'perms' => [
                    'view-permissions','create-permissions','edit-permissions','delete-permissions',
                ],
            ],
            'management-customers' => [
                'label' => 'Permission Customer',
                'description' => 'Semua permission untuk manajemen customer',
                'sort' => 30,
                'perms' => [
                    'view-customers','create-customers','edit-customers','delete-customers','send-verifications-customers',
                ],
            ],
            'management-roles' => [
                'label' => 'Permission Role',
                'description' => 'Semua permission untuk manajemen role',
                'sort' => 40,
                'perms' => [
                    'view-roles','create-roles','edit-roles','delete-roles',
                ],
            ],
            'mail-settings' => [
                'label' => 'Permissions Mail Settings',
                'description' => 'Pengaturan mail (view/edit)',
                'sort' => 50,
                'perms' => [
                    'view-mail','edit-mail',
                ],
            ],
        ];

        foreach ($map as $key => $cfg) {
            /** @var PermissionCategory $cat */
            $cat = PermissionCategory::firstOrCreate(
                ['name' => $cfg['label']],
                ['description' => $cfg['description'], 'sort_order' => $cfg['sort']]
            );

            $ids = Permission::whereIn('name', $cfg['perms'])->pluck('id')->all();
            if ($ids) {
                $cat->permissions()->syncWithoutDetaching($ids);
            }
        }
    }
}

