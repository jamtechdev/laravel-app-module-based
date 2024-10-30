<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'superadmin']);

        $permissions = [
            'view-post',
            'create-post',
            'edit-post',
            'delete-post',
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            if (!$admin->permissions()->where('id', $permission->id)->exists()) {
                $admin->givePermission($permission);
            }
        }
    }
}
