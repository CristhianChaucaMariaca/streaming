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

        //create Permissions Group
        Permission::create(['name' => 'show.groups']);
        Permission::create(['name' => 'delete.group']);
        Permission::create(['name' => 'edit.group']);



        //create roles and assign existing permissions
        $role = Role::create(['name' => 'Super-Admin']);

        $role1 = Role::create(['name' => 'administrator']);
        $role1->givePermissionTo('show.groups');
        $role1->givePermissionTo('delete.group');
        $role1->givePermissionTo('edit.group');


        $role2 = Role::create(['name' => 'User']);
        // $role2->givePermissionTo('show.groups');

    }
}
