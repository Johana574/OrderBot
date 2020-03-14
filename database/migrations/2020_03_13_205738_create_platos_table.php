<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categoria_id');
            
            $table->string('descripcion', 30);
            $table->integer('precio', 30);
            
            $table->timestamps();


            $table->foreign('categoria_id')
        	->references('id')->on('categorias')
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
        Schema::dropIfExists('platos');
    }
}
