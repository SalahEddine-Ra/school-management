<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'teacher']);
        Role::firstOrCreate(['name' => 'student']);
        Role::firstOrCreate(['name' => 'guardian']);
        Role::firstOrCreate(['name' => 'accountant']);

        // Create a super admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('admin');

        // Create test users for other roles
        $teacher = User::firstOrCreate(
            ['email' => 'teacher@school.com'],
            ['name' => 'Test Teacher', 'password' => Hash::make('password')]
        );
        $teacher->assignRole('teacher');

        $student = User::firstOrCreate(
            ['email' => 'student@school.com'],
            ['name' => 'Test Student', 'password' => Hash::make('password')]
        );
        $student->assignRole('student');

        $guardian = User::firstOrCreate(
            ['email' => 'guardian@school.com'],
            ['name' => 'Test Guardian', 'password' => Hash::make('password')]
        );
        $guardian->assignRole('guardian');

        $accountant = User::firstOrCreate(
            ['email' => 'accountant@school.com'],
            ['name' => 'Test Accountant', 'password' => Hash::make('password')]
        );
        $accountant->assignRole('accountant');
    }
}