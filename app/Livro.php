<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livro';


    protected $fillable = [
    	'titulo',
    	'autor',
    	'data',
    	'paginas',
    	'categoria'
    ];

    public function usuarios()
    {
    	return $this->hasMany(Usuario::class);
    }

}
