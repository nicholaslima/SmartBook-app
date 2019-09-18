
function TelefonesController()
{
	this.qtd_telefone = $('#qtd_telefone');
	ajax = new Ajax();
	telefoneObj = new TelefonesView();

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

	this.inserir_telefone = function(){
		num_telefones = this.qtd_telefone.val();
		

		for(var i = 1;i <= num_telefones; i++){
			
			inputTelefone = $("#telefone-"+i);
			elementoId = $('#id_usuario');
			inputToken = $('input[name=_token]');
			

			var telefone = {
					id_usuario: elementoId.text(),
					telefone: inputTelefone.val(),
					_token: inputToken.val(),
				};

			sucesso = function(data){
				linha = telefoneObj.getLinha(data);
				console.log(data);
				$('.telefoneInput').remove();
				$('#lista-telefones').append(linha);
				setMsg("telefone inserido com sucesso","alert alert-success");
			};	

			erro = function(){
				setMsg("erro ao enviar a requisição","alert alert-danger");
			};

			ajax.post('/inserir_telefone',telefone,sucesso,erro);
		}
	}


	this.deletar_telefone = function(id,li)
	{
		inputToken = $('input[name=_token]');

		telefone = {
			id_telefone: id,
			_token: inputToken.val()
		}

		sucesso = function(data){
			li.remove();
			setMsg("telefone excluido com sucesso","alert alert-success");
		};	

		erro = function(){
			setMsg("erro ao enviar a requisição","alert alert-danger");
		};

		ajax.post('/excluir_telefone',telefone,sucesso,erro);

	}

	this.inserir_form = function(telefone,telefoneElemento,item){
			input = '<input type="text" class="telefoneInput form-control col-md-5" value="'+telefone+'" />';
			item.after(input);
			telefoneElemento.remove();
	}

	

	this.atualizar_telefone = function(tel,id,telElemento){
		inputToken = $('input[name=_token]');
		id_usuario = $('#id_usuario').text();

		telefone = {
			id_telefone: id,
			id_usuario: id_usuario,
			numero: tel,
			_token: inputToken.val()
		}

		retirar_form = function(telElemento,tel){
			p = '<p class="telefone">'+tel+'</p>';
			telElemento.after(p)
			telElemento.remove();
		}

		sucesso = function(data){
			retirar_form(telElemento,tel);
			setMsg("telefone atualizado com sucesso","alert-success");
		};

		erro = function(data){
			setMsg("falha na atualização","alert-danger");
			console.log(data)
		};

		ajax.post('/atualizar_telefone',telefone,sucesso,erro);
	}
}