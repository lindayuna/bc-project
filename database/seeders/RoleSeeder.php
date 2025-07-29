<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create roles if they don't exist
        $roles = ['superadmin', 'admin', 'dokter', 'user'];
        
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }
        
        // Create permissions if needed
        $permissions = [
            'view-predictions',
            'create-predictions',
            'delete-predictions',
            'manage-users',
            'manage-content',
        ];
        
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }
        
        // Assign permissions to roles
        $userRole = Role::findByName('user');
        $userRole->givePermissionTo(['view-predictions', 'create-predictions', 'delete-predictions']);
        
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(['view-predictions', 'create-predictions', 'delete-predictions', 'manage-users', 'manage-content']);
        
        $superAdminRole = Role::findByName('superadmin');
        $superAdminRole->givePermissionTo(Permission::all());
    }
}
