

function ajax(){

	var enviando = function(){
		var icone = '<i class="fa fa-spinner fa-spin mr-1"></i>';
		btnInserir.prepend(icone);
		textoBtnInserir.text('enviando');
	}


	this.post = function(url,data){
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
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

}