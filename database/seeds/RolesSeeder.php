<?php

use Illuminate\Database\Seeder;
use Netflics\Models\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	'Administrador',
        	'Empleado',
        	'Cliente'
        ];

        foreach ($roles as $item) {
            $rol = new Rol();
            $rol->nombre = $item;
            $rol->save();
        }
    }
}
