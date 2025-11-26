<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Submodule;
use Illuminate\Database\Seeder;

class ModulesAndSubmodulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configuracion = Module::create(['name' => 'Configuración', 'icon' => 'fas fa-cog']);

        $configuracion->roles()->sync([2, 3, 4, 46]);

        Submodule::create([
            'name' => 'Usuarios',
            'url' => '/Dashboard/Users/Index',
            'icon' => 'fas fa-users',
            'module_id' => $configuracion->id,
            'permission_id' => 2
        ]);

        /*Submodule::create([
            'name' => 'Accesos',
            'url' => '/Dashboard/RolesAndPermissions/Index',
            'icon' => 'fas fa-key-skeleton-left-right',
            'module_id' => $configuracion->id,
            'permission_id' => 19
        ]);

        Submodule::create([
            'name' => 'Enrutamientos',
            'url' => '/Dashboard/ModulesAndSubmodules/Index',
            'icon' => 'fas fa-shield-keyhole',
            'module_id' => $configuracion->id,
            'permission_id' => 26
        ]);*/

        Submodule::create([
            'name' => 'Categorias',
            'url' => '/Dashboard/Categories/Index',
            'icon' => 'fas fa-list',
            'module_id' => $configuracion->id,
            'permission_id' => 6
        ]);

        Submodule::create([
            'name' => 'Tipos de Documentos',
            'url' => '/Dashboard/TypeDocuments/Index',
            'icon' => 'fas fa-address-card',
            'module_id' => $configuracion->id,
            'permission_id' => 10
        ]);

        Submodule::create([
            'name' => 'Tipos de Personas',
            'url' => '/Dashboard/TypePerson/Index',
            'icon' => 'fas fa-user-tie',
            'module_id' => $configuracion->id,
            'permission_id' => 46
        ]);

        $administracion = Module::create(['name' => 'Administración', 'icon' => 'fas fa-folder']);

        $administracion->roles()->sync([5, 6, 7]);

        Submodule::create([
            'name' => 'Clientes',
            'url' => '/Dashboard/Clients/Index',
            'icon' => 'fas fa-user-tie',
            'module_id' => $administracion->id,
            'permission_id' => 14
        ]);

        Submodule::create([
            'name' => 'Proveedores',
            'url' => '/Dashboard/Providers/Index',
            'icon' => 'fas fa-person-dolly',
            'module_id' => $administracion->id,
            'permission_id' => 18
        ]);

        Submodule::create([
            'name' => 'Productos',
            'url' => '/Dashboard/Products/Index',
            'icon' => 'fas fa-shoe',
            'module_id' => $administracion->id,
            'permission_id' => 22
        ]);

        $comercial = Module::create(['name' => 'Comercial', 'icon' => 'fas fa-money-bill']);

        $comercial->roles()->sync([8, 9]);

        Submodule::create([
            'name' => 'Ventas',
            'url' => '/Dashboard/Sales/Index',
            'icon' => 'fas fa-hand-holding-dollar',
            'module_id' => $comercial->id,
            'permission_id' => 26
        ]);

        Submodule::create([
            'name' => 'Compras',
            'url' => '/Dashboard/Shoppings/Index',
            'icon' => 'fas fa-cart-shopping',
            'module_id' => $comercial->id,
            'permission_id' => 32
        ]);
    }
}
