<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Roles
        $staffLapangan = Role::create(['name' => 'Staff Lapangan']);
        $kepalaPerpajakan = Role::create(['name' => 'Kepala Perpajakan']);
        $admin = Role::create(['name' => 'Admin']);

        // Permissions
        $viewWajibPajak = Permission::create(['name' => 'view wajib pajak']);
        $manageWajibPajak = Permission::create(['name' => 'manage wajib pajak']);
        $manageUser = Permission::create(['name' => 'manage user']);  // Permission untuk mengelola user

        // Assign Permissions
        $staffLapangan->givePermissionTo(['view wajib pajak', 'manage wajib pajak']);
        $kepalaPerpajakan->givePermissionTo('view wajib pajak');
        $admin->givePermissionTo(['manage user', 'view wajib pajak', 'manage wajib pajak']); // Admin punya semua permission
    }
}

