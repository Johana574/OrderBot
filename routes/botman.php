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

$botman->hears('listar categorias|listar', function ($bot) {
	$categorias = \App\Categoria::orderby('descripcion', 'asc')->get();

	foreach($categorias as $categoria)
	{
    		$bot->reply($categoria->id."- ".$categoria->descripcion);
	}

	if(count($categorias) == 0)
    		$bot->reply("Ups, no hay categorias para mostrar.");
});



$botman->fallback(function ($bot) {
	$bot->reply("No entiendo que quieres decir, vuelve a intentarlo.");
});


$botman->hears('Start conversation', BotManController::class.'@startConversation');
