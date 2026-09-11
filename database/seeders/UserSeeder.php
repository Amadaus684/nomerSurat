<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $currentPassword = 'password123';
        
        $users = [
            [
                'name' => 'superior',
                'full_name' => 'Super Mimin',
                'email' => 'superadmin@example.com',
                'password' => $currentPassword,
                'role' => 'Super Admin',
            ],
            [
                'name' => 'admin',
                'full_name' => 'Mimin',
                'email' => 'admin@example.com',
                'password' => $currentPassword,
                'role' => 'Admin',
            ],
            [
                'name' => 'operator',
                'full_name' => 'Operator',
                'email' => 'operator@example.com',
                'password' => $currentPassword,
                'role' => 'Operator',
            ],
            [
                'name' => 'viewer',
                'full_name' => 'Viewer',
                'email' => 'viewer@example.com',
                'password' => $currentPassword,
                'role' => 'Viewer',
            ],
        ];

        foreach ($users as $userData) {
            $role = Role::findByName($userData['role']);

            $user = User::updateOrCreate(
                [
                    'email' => $userData['email'],
                ],
                [
                    'name' => $userData['name'],
                    'full_name' => $userData['full_name'],
                    'password' => Hash::make($userData['password']),
                ],
            );

            $user->syncRoles([$role]);
        }
    }
}