<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Créer les rôles
        $admin = Role::create(['name' => 'admin']);
        $membre = Role::create(['name' => 'membre']);

        // Définir quelques permissions
        Permission::create(['name' => 'create project']);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'delete project']);
        Permission::create(['name' => 'view tasks']);
        Permission::create(['name' => 'edit tasks']);

        // Associer permissions aux rôles
        $admin->givePermissionTo(['create project', 'edit project', 'delete project', 'view tasks', 'edit tasks']);
        $membre->givePermissionTo(['view tasks', 'edit tasks']);
    }
}
