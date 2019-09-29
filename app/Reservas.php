<?php 
namespace App;
use App\Livro;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
	protected $table = 'reservas';

	public $timestamps = false;

    protected $fillable = [
    	'livro_id',
        'user_id',
        'data_reserva',
        'data_entrega'
    ];

    public function livro()
    {
    	return $this->belongsTo(Livro::class);
    }
}