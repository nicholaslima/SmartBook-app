<?php 
namespace App\Helpers;

class CriadorEmails
{
	public function criarEmails($qtd_email,$request,$usuario)
	{
		for($o = 0;$o  <= $qtd_email; $o++){
			$emails ='email-'.$o;
			$email = $request->$emails;

			$usuario->Emails()->create([
				'email' => $email,
			]);
		};
	}
}