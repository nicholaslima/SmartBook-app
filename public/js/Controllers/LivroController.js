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

	var setMsg = function(mensg,alerta){
		msg.text(mensg);
		msg.removeClass('invisible');
		msg.addClass(alerta);
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

	this.deletar = function()
	{
		var livrosIds = $('.livrosInput:checked');
		var inputToken = $('input[name=_token]');

		var ids = JSON.stringify(livrosIds);

		livros = {
			_token: inputToken.val(),
			livros: ids
		};
			
		sucesso = function(data){
			setMsg("livros deletado com sucesso","alert-success");
			console.log(data);
		};

		erro = function(data){
			setMsg("erro ao enviar uma requisição","alert-danger");
			console.log(data);
		};

		ajax.post('/deletar_livros',livros,sucesso,erro);
	}
}