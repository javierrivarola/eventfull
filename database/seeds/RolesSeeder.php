<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->createRolesAndPermissions();
    }

    private function createRolesAndPermissions(){
      $persona = Role::create(['name' => 'persona']);
      $alumno = Role::create(['name' => 'alumno']);
      $investigador = Role::create(['name' => 'investigador']);
      $profesional = Role::create(['name' => 'profesional']);
      $profesor = Role::create(['name' => 'profesor']);

      $createCommentPermission = Permission::create(['name' => 'create comment']);
      $persona->syncPermissions([$createCommentPermission]);
      $alumno->syncPermissions([$createCommentPermission]);
      $investigador->syncPermissions([$createCommentPermission]);
      $profesional->syncPermissions([$createCommentPermission]);
      $profesor->syncPermissions([$createCommentPermission]);
    }

}
