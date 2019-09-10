<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LivroUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_usuario',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('usuario_id');
            $table->integer('livro_id');

            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuario');

            $table->foreign('livro_id')
                ->references('id')
                ->on('livro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro_usuario');
    }
}
