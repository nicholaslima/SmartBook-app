<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivroUsuario extends Model
{
   	protected $table = 'livro_usuario';
   	public $timestamps = false;

   	protected $fillable = [
   		'usuario_id',
   		'livro_id'
   	];

   	public function livro(){
   		return $this->belongsTo(livro::class);
   	}

   	public function usuario(){
   		return $this->belongsTo(usuario::class);
   	}
}
