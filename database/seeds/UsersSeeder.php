<?php

use Illuminate\Database\Seeder;
use Netflics\Models\User;
use Netflics\Models\Rol;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Rol::find(1);

        $user = new User();
        $user->fill([
                'nombres' => 'Alejandro Antonio',
                'paterno' => 'Sánchez',
                'materno' => 'Rangel',
                'email' => 'to.ny_44@hotmail.com',
                'password' => bcrypt('password'),
                'foto' => 'imagenes/perfil_usuarios/ninja.png'
            ]);
        $user->rol()->associate($role)->save();

        $user = new User();
        $user->fill([
                'nombres' => 'Josue Roberto',
                'paterno' => 'Anguiano',
                'materno' => 'González',
                'email' => 'josue@hotmail.com',
                'password' => bcrypt('password'),
                'foto' => 'imagenes/perfil_usuarios/ninja.png'
            ]);
        $user->rol()->associate($role)->save();
    }
}
