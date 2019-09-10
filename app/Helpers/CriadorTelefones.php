<?php  

namespace App\Helpers;


class CriadorTelefones
{
	public function criarTelefones($qtd_telefones,$usuario,$request)
	{

		for($i = 0;$i  <= $qtd_telefones; $i++){
			$telefones ='telefone-'.$i;
			$telefone = $request->$telefones;

			$usuario->Telefones()->create([
				'numero' => $telefone,
			]);
		};
	}
}