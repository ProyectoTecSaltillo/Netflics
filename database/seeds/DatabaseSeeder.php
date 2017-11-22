<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(GenerosSeeder::class);
        $this->call(EstatusSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
