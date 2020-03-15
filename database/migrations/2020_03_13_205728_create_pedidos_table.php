
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('plato_id');
            $table->unsignedInteger('estado_id');

            $table->timestamps ('fecha');
            $table->integer('valor_total', 30);


            $table->timestamps();

            $table->foreign('usuario_id')
        	->references('id')->on('usuarios')
        	->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('plato_id')
        	->references('id')->on('platos')
        	->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('estado_id')
        	->references('id')->on('estados')
        	->onUpdate('cascade')
        	->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}