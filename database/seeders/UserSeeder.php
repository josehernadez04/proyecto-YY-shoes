<?php

namespace Database\Seeders;

use App\Models\TypeDocument;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RolesAndPermissions = Role::with('permissions')->get();

        $typeDocument = new TypeDocument();
        $typeDocument->code = 'CC';
        $typeDocument->description = 'Cedula';
        $typeDocument->save();
        
        $user = User::create([
            'name' => 'Camilo Andres',
            'document' => '1004845200',
            'email' => 'camiloacacio16@gmail.com',
            'password' => bcrypt('12345678'),
            'type_document_id' => $typeDocument->id
        ]);

        foreach($RolesAndPermissions as $RoleAndPermission) {
            $user->assignRole([$RoleAndPermission->name]);
            $user->givePermissionTo($RoleAndPermission->permissions->pluck('name'));
        };
    }
}
