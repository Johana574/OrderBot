<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Actions\Input;


class PedidoConversacion extends Conversation
{

    protected $idPlato;
    protected $precio;
    protected $cantidad;


    public function __construct($idPlato)
    {
        $this->idPlato = $idPlato;
        $this->cantidad = 0;
        $this->precio = 0;
    }

    public function run()
    {
        if($this->cargarInformacion() == false)
                return;

        $this->iniciar();
    }

    private function cargarInformacion()
    {
        $this->orden = \App\Plato::find($this->idPlato);

        if($this->orden === null)
        {
                $this->say("Lo siento, el plato solicitado no existe.");
                return false;
        }

        /*
        if(count($this->plato->categoria) == 0)
        {
                $this->say("Lo siento, la categoria no tiene platos.");
                return false;
        }
        */
        return true;
    }

    public function iniciar()
    {
    
        $this->say("Ingresa Cantidad de '".$this->orden->descripcion."'.");

        
        $consulta = Question::create("Ingresa cantidad de platos")
        ->addButtons([
                Button::create("un plato")->value('1'),
                Button::create("dos platos")->value('2')
        ]);
        
        $this->ask($consulta, function (Answer $answer)
        {
                $texto = $answer->getText();
                $valor = $answer->getValue();
    
                switch($valor)
                {
                    case "1":
                        $this->say("UN SOLO PLATO.");
                        $cantidad = 1;
                        
                break;
    
                    case "2":
                        $this->say("PEDISTE 2 PLATOS");
                        $cantidad = 2;
                break;
    
                    default:
                        $this->say("NO PIDIO NADA MANITO");
                        $this->repeat();
                break;
                }
                
        });   	 





/*

	$consulta = Question::create("Ingresa cantidad de platos")
	->addButtons([
    		Button::create("Sip, soy valiente")->value('si'),
    	    Button::create("Nop, deje asi")->value('no')
	]);

	$this->ask($consulta, function (Answer $answer)
	{
    		$texto = $answer->getText();
    	    $valor = $answer->getValue();

    		switch($valor)
    	{
        		case "si":
            		return $this->solucionar(0);
        	break;

        		case "no":
            		$this->say("Esta bien, no te preocupes, no haremos nada.");
            		return false;
        	break;

        		default:
            		$this->say("Por favor elige una de las opciones: 'si' o 'no'.");
            		$this->repeat();
        	break;
            }
            
    });   	 
    */
    }




}
