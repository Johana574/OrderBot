<?php

use Illuminate\Database\Seeder;

class Categoria2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $categoria = \App\Categoria::create(['descripcion' => 'Categoria 2']);

	    \App\Plato::create(['plato_id' => $quiz->id,
                        	'descripcion' => 'contenido plato 4',
                        	'precio' => '4000']);

        \App\Plato::create(['plato_id' => $quiz->id,
                        	'descripcion' => 'contenido plato 5',
                        	'precio' => '5000']);

        \App\Plato::create(['plato_id' => $quiz->id,
                        	'descripcion' => 'contenido plato 6',
                        	'precio' => '6000']);

    }
}
