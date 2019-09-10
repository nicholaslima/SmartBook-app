<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = 'emails';

    public $timestamps = false;

    protected $fillable = [
    	'email'
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
