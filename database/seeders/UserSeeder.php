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
        $rolesAndPermissions = Role::with('permissions')->get();

        $typeDocument = new TypeDocument();
        $typeDocument->code = 'CC';
        $typeDocument->description = 'Cedula';
        $typeDocument->save();

        $user = User::create([
            'name' => 'Camilo Andres',
            'document' => '1004845200',
            'email' => 'camiloacacio16@gmail.com',
            'phone' => '3012345678',
            'address' => 'Calle 123 #45-67',
            'birthdate' => '1990-01-01',
            'password' => bcrypt('12345678'),
            'type_document_id' => $typeDocument->id
        ]);

        foreach($rolesAndPermissions as $RoleAndPermission) {
            $user->assignRole([$RoleAndPermission->name]);
            $user->givePermissionTo($RoleAndPermission->permissions->pluck('name'));
        };
    }
}
