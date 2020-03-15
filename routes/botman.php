<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');


$botman->hears('/start', function ($bot) {
	$nombres = $bot->getUser()->getFirstName() ?: "desconocido";
	$bot->reply('Hola ' . $nombres . ', bienvenido al bot OrderBot!');
});


$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Hola', function ($bot) {
    $bot->reply('Cordial saludo, bienvenido al restaurante petacazo, desea ver las categorias a su disposicion?');
});


$botman->hears('listar categorias|listar', function ($bot) {
	$categorias = \App\Categoria::orderby('id', 'asc')->get();

	foreach($categorias as $categoria)
	{
			$bot->reply($categoria->id."- ".$categoria->descripcion);
			
	}
	
	$bot->reply("Si deseas ver la Categoria escribe Cat #");


	if(count($categorias) == 0)
    		$bot->reply("Ups, no hay categorias para mostrar.");
});



$botman->hears('cat {id}', function ($bot , $id) {
	
	$platos = \App\Plato::orderby('id', 'asc')->get();

	foreach($platos as $plato)
	{
			if ($plato->Categoria->id == $id) {

				$bot->reply($plato->id."- ".$plato->descripcion);

				
			
			}

	}

	if(count($platos) == 0)
    		$bot->reply("Ups, no hay categorias para mostrar.");
});


$botman->hears('plato {id}', function ($bot, $id) {
	$bot->startConversation(

new \App\Conversations\PedidoConversacion($id));

})->stopsConversation();






$botman->hears('acerca de|acerca', function ($bot) {
	$msj = "Este bot fue desarrollado por Johana Saldarriaga y Carlos Marquez, en la clase de maestria de Metodos agiles.";

	$bot->reply($msj);
});




$botman->fallback(function ($bot) {
	$bot->reply("No entiendo que quieres decir, vuelve a intentarlo.");
});


$botman->hears('Start conversation', BotManController::class.'@startConversation');
