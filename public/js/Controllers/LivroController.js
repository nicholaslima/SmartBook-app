function LivroController()
{

	var inputTitulo = $('#titulo');
	var inputAutor = $('#autor');
	var inputData = $('#data');
	var inputPaginas = $('#paginas');
	var inputCategoria = $('#categoria');
	var inputToken = $('input[name=_token]');
	var inputId = $('#id');

	var btnInserir = $('#btn-livro-inserir');
	var btnAtualizar = $('#btn-livro-atualizar');
	var textoBtnInserir = $('#texto-btn-inserir');
	var textoBtnAtualizar = $('#texto-btn-atualizar');
	var msg = $('#msgUsuario');

	ajax = new Ajax();
	alerta = new Alertas();

	var livro = {
		id: inputId.val(),
		titulo: inputTitulo.val(),
		autor: inputAutor.val(),
		data: inputData.val(),
		paginas: inputPaginas.val(),
		categoria: inputCategoria.val(),
		_token: inputToken.val()
	};

	var enviando = function(){
		var icone = '<i class="fa fa-spinner fa-spin mr-1"></i>';
		btnInserir.prepend(icone);
		textoBtnInserir.text('enviando');
	}

	var enviandoAtualizacao = function(){
		var icone = '<i class="fa fa-spinner fa-spin mr-1"></i>';
		btnAtualizar.prepend(icone);
		textoBtnAtualizar.text('enviando');
	}

	var apagarForm = function(){
		inputTitulo.val('');
		inputAutor.val('');
		inputData.val('');
		inputPaginas.val('');
		inputCategoria.val('');
	}

	
	this.inserirLivro = function(){
		$.ajax({
			url: '/inserir',
			type: 'POST',
			data: livro,
			beforeSend: function(){
				enviando();
			}
		})
		.done(function(){
			$(".fa-spinner").remove();
			textoBtnInserir.text('cadastrar');
			apagarForm();
			setMsg('livro '+livro.titulo+' foi cadastrado com sucesso','alert-info');
		})
		.fail(function(){
			$(".fa-spinner").remove();
			textoBtnInserir.text('cadastrar');
			setMsg('falha ao enviar uma requisição','alert-info');
		})
	}


	this.atualizarLivro = function(){
		$.ajax({
			url: '/atualizar-livro',
			type: 'POST',
			data: livro,
			beforeSend: function(){
				enviandoAtualizacao();
			}
		})
		.done(function(){
			$(".fa-spinner").remove();
			textoBtnAtualizar.text('atualizar');
			setMsg('livro '+livro.titulo+' foi atualizado com sucesso','alert-info');
		})
		.fail(function(){
			$(".fa-spinner").remove();
			textoBtnAtualizar.text('atualizar');
			setMsg('falha ao enviar uma requisição','alert-info');
		})
	}

	this.deletar = function(ids)
	{
		var inputToken = $('input[name=_token]');

		livros = {
			_token: inputToken.val(),
			livros: ids
		};
			
		sucesso = function(livros){
			alerta.setMsg("livros deletados com sucesso","alert-success");
		};

		erro = function(livros){
			alerta.setMsg("erro ao enviar uma requisição","alert-danger");
		};

		ajax.post('/deletar_livros',livros,sucesso,erro);
	}
	

	this.reservar = function(ids)
	{
		var inputToken = $('input[name=_token]');

		livros = {
			_token: inputToken.val(),
			livros: ids
		};
			
		sucesso = function(livros){
			alerta.setMsg('livros reservados com sucesso','alert-success');
		};

		erro = function(livros){
			alerta.setMsg('erro ao enviar uma requisição','alert-danger');
		};

		ajax.post('/reservarLivros',livros,sucesso,erro);
	}
}