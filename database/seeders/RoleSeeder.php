<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin_cursos'])->syncRoles([$role1]);
        Permission::create(['name' => 'selec_requisitos'])->syncRoles([$role1]);
        Permission::create(['name' => 'selec_alcances'])->syncRoles([$role1]);
        Permission::create(['name' => 'selec_clases'])->syncRoles([$role1]);
        Permission::create(['name' => 'inscritos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin_validar'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin_recetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'selec_ingredientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'selec_indicaciones'])->syncRoles([$role1]);
        //Permission::create(['name' => 'detallereceta'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin_eventos'])->syncRoles([$role1]);
        Permission::create(['name' => 'selec_parrafos'])->syncRoles([$role1]);
        //Permission::create(['name' => 'detallevento'])->syncRoles([$role1]);
        //Permission::create(['name' => 'registrosev'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin_slides'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin_usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver_matricula'])->syncRoles([$role1]);
    }
}
