<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);

        Permission::create(['name' => 'ver libros']);
        Permission::create(['name' => 'crear libros']);
        Permission::create(['name' => 'editar libros']);
        Permission::create(['name' => 'eliminar libros']);

        $adminUser = User::query()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '12345',
            'email_verified_at' => now()
        ]);

        $roleAdmin = Role::create(['name' => 'super-admin']);
        $adminUser->assignRole($roleAdmin);
        $permissionsAdmin = Permission::query()->pluck('name');
        $roleAdmin->syncPermissions($permissionsAdmin);

        $studentUser = User::query()->create([
            'name' => 'student',
            'email' => 'student@student.com',
            'password' => '12345',
            'email_verified_at' => now()
        ]);

        $roleStudent = Role::create(['name' => 'student']);
        $studentUser->assignRole($roleStudent);
        $roleStudent->syncPermissions(['ver libros']);
    }
}
