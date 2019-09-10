class Contato
{

	construct(){
		_telefone = $('#telefone');
		_email = $('#email');
	}

	get email()
	{
		return $this._email;
	}

	set email(email)
	{
		$this._email = email;
	}

	get telefone()
	{
		return $this._telefone;
	}

	set telefone(telefone)
	{
		$this._telefone = telefone;
	}

}