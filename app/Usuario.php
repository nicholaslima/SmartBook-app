<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Emails;
use App\Telefones;
use App\Livro;

class Usuario extends Model
{
    protected $table = 'usuario';

    public $timestamps = false;

    protected $fillable = [
    	'nome',
    	'cpf',
    	'endereco',
    	'bairro',
    	'cidade',
    	'estado'
    ];

    public function Telefones()
    {
    	return $this->hasMany(Telefones::class);
    }

    public function Emails()
    {
    	return $this->hasMany(Emails::class);
    }

     public function Livros()
    {
        return $this->hasMany(Livro::class);
    }
}
