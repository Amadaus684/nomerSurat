<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Reset cached permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // Surat
            'surat.view',
            'surat.create',
            'surat.update',
            'surat.delete',

            // Jenis Surat
            'jenis_surat.view',
            'jenis_surat.create',
            'jenis_surat.update',
            'jenis_surat.delete',

            // Klasifikasi
            'klasifikasi.view',
            'klasifikasi.create',
            'klasifikasi.update',
            'klasifikasi.delete',

            // Kategori
            'kategori.view',
            'kategori.create',
            'kategori.update',
            'kategori.delete',

            // Users
            'users.view',
            'users.create',
            'users.update',
            'users.delete',

            // Roles
            'roles.view',
            'roles.create',
            'roles.update',
            'roles.delete',

            // Permissions
            'permissions.view',
            'permissions.create',
            'permissions.update',
            'permissions.delete',

            // Settings
            'settings.view',
            'settings.update',

            // Activity Logs
            'activity_logs.view',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate(
                $permission,
                'web'
            );
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Super Admin
        $superAdmin = Role::findOrCreate('Super Admin', 'web');

        // Admin
        $admin = Role::findOrCreate('Admin', 'web');

        // Operator
        $operator = Role::findOrCreate('Operator', 'web');

        // Viewer
        $viewer = Role::findOrCreate('Viewer', 'web');

        /*
         * Super Admin
         *
         * We will handle full access through Gate::before()
         * rather than assigning every permission individually.
         */

        // Admin permissions
        $admin->syncPermissions([
            'surat.view',

            'jenis_surat.view',
            'jenis_surat.create',
            'jenis_surat.update',

            'klasifikasi.view',
            'klasifikasi.create',
            'klasifikasi.update',

            'kategori.view',
            'kategori.create',
            'kategori.update',

            'users.view',
            'users.create',
            'users.update',

            'settings.view',
            'settings.update',

            'activity_logs.view',
        ]);

        // Operator permissions
        $operator->syncPermissions([
            'surat.view',
            'surat.create',
            'surat.update',

            'jenis_surat.view',

            'klasifikasi.view',

            'kategori.view',
        ]);

        // Viewer permissions
        $viewer->syncPermissions([
            'surat.view',

            'jenis_surat.view',

            'klasifikasi.view',

            'kategori.view',
        ]);

        // Clear cache again after modifications
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
