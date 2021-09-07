<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create Permissions Users
        Permission::create(['name' => 'show.users']);
        Permission::create(['name' => 'show.user']);
        Permission::create(['name' => 'delete.user']);
        Permission::create(['name' => 'edit.user']);
        Permission::create(['name' => 'create.user']);

        //create Permissions Group
        Permission::create(['name' => 'show.groups']);
        Permission::create(['name' => 'delete.group']);
        Permission::create(['name' => 'edit.group']);
        Permission::create(['name' => 'leave.group']);
        Permission::create(['name' => 'add.service.to.group']);
        Permission::create(['name' => 'dettach.service.from.group']);

        //create Permissions Servicios

        Permission::create(['name' => 'show.service']);
        Permission::create(['name' => 'edit.service']);
        Permission::create(['name' => 'create.service']);
        Permission::create(['name' => 'delete.service']);

        //create Permissions Payments


        //create roles and assign existing permissions
        $role = Role::create(['name' => 'Super-Admin']);

        $role1 = Role::create(['name' => 'administrator']);
        $role1->givePermissionTo('show.groups');
        $role1->givePermissionTo('delete.group');
        $role1->givePermissionTo('edit.group');
        $role1->givePermissionTo('dettach.service.from.group');
        $role1->givePermissionTo('add.service.to.group');


        $role2 = Role::create(['name' => 'User']);
        $role2->givePermissionTo('leave.group');

    }
}
