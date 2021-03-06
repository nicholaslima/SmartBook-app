<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Livros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro',function(Blueprint $table){
            $table->increments('id');
            $table->string('titulo');
            $table->string('autor');
            $table->string('data');
            $table->string('paginas');
            $table->string('categoria');
            $table->boolean('reservado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('livro');
    }
}
