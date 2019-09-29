<?php

namespace App;
use App\Emails;
use App\Telefones;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $table = 'contato';

    protected  $fillable = [
    	'menagem',
    	'nome'
    ];

    public function emails()
    {
    	return $this->hasMany(Emails::class);
    }

    public function telefones()
    {
    	return $this->hasMany(Telefones::class)
    }

}
