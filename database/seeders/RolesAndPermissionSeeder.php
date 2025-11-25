<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboard = Role::create(['name' => 'Dashboard']);
        $users = Role::create(['name' => 'Users']);
        $categories = Role::create(['name' => 'Categories']);
        $typeDocuments = Role::create(['name' => 'TypeDocuments']);

        $clients = Role::create(['name' => 'Clients']);
        $providers = Role::create(['name' => 'Providers']);
        $products = Role::create(['name' => 'Products']);
        $sales = Role::create(['name' => 'Sales']);
        $shoppings = Role::create(['name' => 'Shoppings']);
        $rolesAndPermissions = Role::create(['name' => 'RolesAndPermissions']);
        $profile = Role::create(['name' => 'Profile']);

        Permission::create(['name' => 'Dashboard'])->syncRoles([$dashboard]);

        Permission::create(['name' => 'Dashboard.Users.Index'])->syncRoles([$users]);
        Permission::create(['name' => 'Dashboard.Users.Store'])->syncRoles([$users]);
        Permission::create(['name' => 'Dashboard.Users.Update'])->syncRoles([$users]);
        Permission::create(['name' => 'Dashboard.Users.Delete'])->syncRoles([$users]);

        Permission::create(['name' => 'Dashboard.Categories.Index'])->syncRoles([$categories]);
        Permission::create(['name' => 'Dashboard.Categories.Store'])->syncRoles([$categories]);
        Permission::create(['name' => 'Dashboard.Categories.Update'])->syncRoles([$categories]);
        Permission::create(['name' => 'Dashboard.Categories.Delete'])->syncRoles([$categories]);

        Permission::create(['name' => 'Dashboard.TypeDocuments.Index'])->syncRoles([$typeDocuments]);
        Permission::create(['name' => 'Dashboard.TypeDocuments.Store'])->syncRoles([$typeDocuments]);
        Permission::create(['name' => 'Dashboard.TypeDocuments.Update'])->syncRoles([$typeDocuments]);
        Permission::create(['name' => 'Dashboard.TypeDocuments.Delete'])->syncRoles([$typeDocuments]);

        Permission::create(['name' => 'Dashboard.Clients.Index'])->syncRoles([$clients]);
        Permission::create(['name' => 'Dashboard.Clients.Store'])->syncRoles([$clients]);
        Permission::create(['name' => 'Dashboard.Clients.Update'])->syncRoles([$clients]);
        Permission::create(['name' => 'Dashboard.Clients.Delete'])->syncRoles([$clients]);

        Permission::create(['name' => 'Dashboard.Providers.Index'])->syncRoles([$providers]);
        Permission::create(['name' => 'Dashboard.Providers.Store'])->syncRoles([$providers]);
        Permission::create(['name' => 'Dashboard.Providers.Update'])->syncRoles([$providers]);
        Permission::create(['name' => 'Dashboard.Providers.Delete'])->syncRoles([$providers]);

        Permission::create(['name' => 'Dashboard.Products.Index'])->syncRoles([$products]);
        Permission::create(['name' => 'Dashboard.Products.Store'])->syncRoles([$products]);
        Permission::create(['name' => 'Dashboard.Products.Update'])->syncRoles([$products]);
        Permission::create(['name' => 'Dashboard.Products.Delete'])->syncRoles([$products]);

        Permission::create(['name' => 'Dashboard.Sales.Index'])->syncRoles([$sales]);
        Permission::create(['name' => 'Dashboard.Sales.Store'])->syncRoles([$sales]);
        Permission::create(['name' => 'Dashboard.Sales.Show'])->syncRoles([$sales]);
        Permission::create(['name' => 'Dashboard.Sales.Update'])->syncRoles([$sales]);
        Permission::create(['name' => 'Dashboard.Sales.Delete'])->syncRoles([$sales]);
        Permission::create(['name' => 'Dashboard.Sales.Details.Store'])->syncRoles([$sales]);

        Permission::create(['name' => 'Dashboard.Shoppings.Index'])->syncRoles([$shoppings]);
        Permission::create(['name' => 'Dashboard.Shoppings.Store'])->syncRoles([$shoppings]);
        Permission::create(['name' => 'Dashboard.Shoppings.Show'])->syncRoles([$shoppings]);
        Permission::create(['name' => 'Dashboard.Shoppings.Update'])->syncRoles([$shoppings]);
        Permission::create(['name' => 'Dashboard.Shoppings.Delete'])->syncRoles([$shoppings]);
        Permission::create(['name' => 'Dashboard.Shoppings.Details.Store'])->syncRoles([$shoppings]);

        Permission::create(['name' => 'Dashboard.RolesAndPermissions.Index'])->syncRoles([$rolesAndPermissions]);
        Permission::create(['name' => 'Dashboard.RolesAndPermissions.Index.Query'])->syncRoles([$rolesAndPermissions]);
        Permission::create(['name' => 'Dashboard.RolesAndPermissions.Create'])->syncRoles([$rolesAndPermissions]);
        Permission::create(['name' => 'Dashboard.RolesAndPermissions.Store'])->syncRoles([$rolesAndPermissions]);
        Permission::create(['name' => 'Dashboard.RolesAndPermissions.Edit'])->syncRoles([$rolesAndPermissions]);
        Permission::create(['name' => 'Dashboard.RolesAndPermissions.Update'])->syncRoles([$rolesAndPermissions]);
        Permission::create(['name' => 'Dashboard.RolesAndPermissions.Delete'])->syncRoles([$rolesAndPermissions]);

        Permission::create(['name' => 'Dashboard.Profile.Index'])->syncRoles([$profile]);
    }
}
