<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefones extends Model
{
    protected $table = 'telefones';

    public $timestamps = false;

    protected $fillable = [
    	'numero'
    ];

    public function contato()
    {
    	return $this->belongsTo(Contatos::class);
    }

    public function usuario()
    {
    	return $this->belongsTo(Usuario::class);
    }
}
