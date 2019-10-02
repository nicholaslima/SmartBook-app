var num_email = 0;
var num_telefone = 0;

function ContatosController()
{

	this.qtd_Email = $('#qtd_email');
	this.qtd_telefone = $('#qtd_telefone');

	this.nomeElemento = $('#nome');
	this.senhaElemento = $('#senha');
	this.cpfElemento = $('#cpf');
	this.enderecoElemento = $('#endereco');
	this.bairroElemento = $('#bairro');
	this.cidadeElemento = $('#cidade');
	this.estadoElemento = $('#estado');
	this.idUsuarioElemento = $("#id_usuario");

	ajax = new Ajax();	
	alerta = new Alertas();

	this.add_email = function(){
		num_email++;
		contagem = num_email;
		var input = '<input type="text" name="email-'+contagem+'" id="email-'+contagem+'" class="form-control-lg form-control my-1" required>';
		$('#p-email').append(input);
		$('#qtd_email').val(contagem);	
	}

	this.excluir_email = function(){
		if(num_email >= 1){
			$("#email-"+num_email).remove();
			num_email--;
			this.qtd_Email.val(num_email);
		}	
	}

	this.add_telefone = function(){
		num_telefone++;
		contagem = num_telefone;
		var input = '<input type="text" name="telefone-'+contagem+'" id="telefone-'+contagem+'" class="telefoneInput form-control-lg form-control my-1" required>';
		$('#p-telefone').append(input);	
		$('#qtd_telefone').val(contagem);
	}

	this.excluir_telefone = function(){
		if(num_telefone >= 1){
			$("#telefone-"+num_telefone).remove();
			num_telefone--;
			this.qtd_telefone.val(num_telefone);
		}	
	}


	this.form_atualizar = function(){
		nome = this.nomeElemento.text();
		senha = this.senhaElemento.text();
		cpf = this.cpfElemento.text();
		endereco = this.enderecoElemento.text();
		bairro = this.bairroElemento.text();
		cidade = this.cidadeElemento.text();
		estado = this.estadoElemento.text();

		usuario = {
			nome: nome,
			senha: senha,
			cpf:cpf,
			endereco:endereco,
			bairro:bairro,
			cidade:cidade,
			estado:estado
		}

		this.nomeElemento.text('');
		this.senhaElemento.text('');
		this.cpfElemento.text('');
		this.enderecoElemento.text('');
		this.bairroElemento.text('');
		this.cidadeElemento.text('');
		this.estadoElemento.text('');

		inputNome = '<input type="text" class="form-control" id="nomeInput" value="'+usuario.nome+'"/>';
		this.nomeElemento.append(inputNome);

		inputSenha = '<input type="text" class="form-control" id="senhaInput" value="'+usuario.senha+'"/>';
		this.senhaElemento.append(inputSenha);

		inputCpf = '<input type="text" class="form-control" id="cpfInput" value="'+usuario.cpf+'"/>';
		this.cpfElemento.append(inputCpf);

		inputEndereco= '<input type="text" class="form-control" id="enderecoInput" value="'+usuario.endereco+'"/>';
		this.enderecoElemento.append(inputEndereco);

		inputBairro = '<input type="text" class="form-control" id="bairroInput" value="'+usuario.bairro+'"/>';
		this.bairroElemento.append(inputBairro);

		inputCidade = '<input type="text" class="form-control" id="cidadeInput" value="'+usuario.cidade+'"/>';
		this.cidadeElemento.append(inputCidade);

		inputEstado = '<input type="text" class="form-control" id="estadoInput" value="'+usuario.estado+'"/>';
		this.estadoElemento.append(inputEstado);

		$('#atualizar').toggle();
	}

	

	this.atualizar_usuario = function()
	{
		var nomeInput = $('#nomeInput');
		var senhaInput = $('#senhaInput');
		var cpfInput = $('#cpfInput');
		var enderecoInput = $('#enderecoInput');
		var bairroInput = $('#bairroInput');
		var cidadeInput = $('#cidadeInput');
		var estadoInput = $('#estadoInput');
		var inputToken = $('input[name=_token]');
		var idUsuarioElemento = $("#id_usuario");

		usuario = {
			nome: nomeInput.val(),
			senha: senhaInput.val(),
			cpf: cpfInput.val(),
			endereco: enderecoInput.val(),
			bairro: bairroInput.val(),
			cidade: cidadeInput.val(),
			estado: estadoInput.val(),
			_token: inputToken.val(),
			id: idUsuarioElemento.text()
		};

		retirar_form = function(){
			nomeElemento = $('#nome');
			senhaElemento = $('#senha');
			cpfElemento = $('#cpf');
			enderecoElemento = $('#endereco');
			bairroElemento = $('#bairro');
			cidadeElemento = $('#cidade');
			estadoElemento = $('#estado');

			nomeElemento.text(nomeInput.val());
			senhaElemento.text(senhaInput.val());
			cpfElemento.text(cpfInput.val());
			enderecoElemento.text(enderecoInput.val());
			bairroElemento.text(bairroInput.val());
			cidadeElemento.text(cidadeInput.val());
			estadoElemento.text(estadoInput.val());

			nomeInput.remove();
			senhaInput.remove();
			cpfInput.remove();
			enderecoInput.remove();
			bairroInput.remove();
			cidadeInput.remove();;
			estadoInput.remove();

			$('#atualizar').toggle();
		}

		sucesso = function()
		{
			alerta.setMsg('usuario atualizado com sucesso','alert alert-success');
			retirar_form();
		};

		erro = function()
		{
			alerta.setMsg('falha na atualização','alert alert-danger');
		};

		ajax.post('/atualizar_usuario',usuario,sucesso,erro);
		
	}
}