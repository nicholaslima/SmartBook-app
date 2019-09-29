<?php

namespace App;
use App\Reservas;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livro';


    protected $fillable = [
    	'titulo',
    	'autor',
    	'data',
    	'paginas',
        'reservado',
    	'categoria'
    ];

    public function reserva()
    {
    	return $this->belongsTo(Reservas::class);
    }

}
