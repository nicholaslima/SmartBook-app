

function Contato()
{

	this._telefone = $('#telefone');
	this._email = $('#email');

	var getEmail = function()
	{
		return this._email;
	}

	var setEmail = function(email)
	{
		this._email = email;
	}

	var getTelefone = function()
	{
		return this._telefone;
	}

	var setTelefone = function(telefone)
	{
		this._telefone = _telefone;
	}

}