<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mensagem');
            $table->string('nome');
            $table->timestamps();
            $table->integer('telefone_id');
            $table->integer('email_id');
            
            $table->foreign('telefone_id')
                    ->references('id')
                    ->on('telefones');

            $table->foreign('email_id')
                ->references('id')
                ->on('emails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
