<?php

use Illuminate\Database\Seeder;
use Netflics\Models\Estatus;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estatus = [
            'Disponible',
			'Vendida',
			'Rentada'
        ];

        foreach ($estatus as $item) {
            $est = new Estatus();
            $est->nombre = $item;
            $est->save();
        }
    }
}
