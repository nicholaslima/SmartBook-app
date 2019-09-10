<?php 
namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class ExclusaoUsuario
{
	public function excluirUsuario($telefones,$emails,$usuario)
	{
		DB::begintransaction();
			foreach($telefones as $telefone){
				$telefone->delete();
			};

			foreach($emails as $email){
				$email->delete();
			};
			
			$usuario->delete();
		DB::commit();
	}
}