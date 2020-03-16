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
        $this->bot->receives('Hi')
            ->assertReply('Hello!');
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
            '/ayuda: Mostrar este mensaje de ayuda',
          	'acerca de|acerca: Ver la información quien desarrollo este lindo bot',
          	'listar quizzes|listar: Listar los cuestionarios disponibles',
          	'iniciar quiz <id>: Iniciar la solución de un cuestionario',
          	'ver puntajes|puntajes: Ver los últimos puntajes',
            'borrar mis datos|borrar: Borrar mis datos del sistema'];
              
        $this->bot
                    ->receives('/ayuda')
                    ->assertReplies($ayuda);
        
    }



}
