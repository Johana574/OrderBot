<?php

use Illuminate\Database\Seeder;

class Categoria1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $categoria = \App\Categoria::create(['descripcion' => 'Categoria 1']);

	    \App\Plato::create(['plato_id' => $orden->id,
                        	'descripcion' => 'contenido plato 1',
                        	'precio' => '1000']);

        \App\Plato::create(['plato_id' => $orden->id,
                        	'descripcion' => 'contenido plato 2',
                        	'precio' => '2000']);

        \App\Plato::create(['plato_id' => $orden->id,
                        	'descripcion' => 'contenido plato 3',
                        	'precio' => '3000']);

    }
}
