<?php

namespace Tests\BotMan;

use Tests\TestCase;

class BotTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->bot->receives('Hola')
            ->assertReply('Cordial saludo, bienvenido al restaurante PetaCazo, desea ver las categorias a su disposicion?');
    }

    
    public function testDesconocido()
    {
     
         $this-> bot->receives('Cualquier cosa')
                    ->assertReply('No es clara tu solicitud, por favor usa el comando Ayuda para ver las opciones.');
    }

    public function testAbout()
    {
        $msj = "Este bot fue desarrollado por Johana Saldarriaga y Carlos Márquez, en la clase de Maestria de Metodos Agiles.";

        $this->bot->receives('acerca de')
        ->assertReply($msj);

        $this->bot->receives('acerca')
        ->assertReply($msj);
    }

    public function testAyuda()
    {

        $ayuda = ['Los comandos disponibles son:',
            'ayuda: Mostrar este mensaje de ayuda',
          	'acerca de|acerca: Ver la información de quien desarrollo este bot',
          	'listar categorias|listar: Listar las categorias disponibles de platos',
          	'cat <id>: Elegir la Categoria con su ID',
          	'Plato <id>: Elegir el Plato'];
              
        $this->bot
                    ->receives('ayuda')
                    ->assertReplies($ayuda);
        
    }


    public function testNoCategoria()
    {

        $this-> bot->receives('listar categorias')
        ->assertReply('1- Perro', '2- Hamburguesa', '3- Pizza');
//        $this-> bot->receives('listar categorias')
//        ->assertReply('2- Hamburguesa');

        $this-> bot->receives('listar')
        ->assertReply('1- Perro', '2- Hamburguesa', '3- Pizza');
    
    }



}
