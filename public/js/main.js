


$('#add-email').click(function(){
	const contato = new ContatosController();
	contato.add_email();
});

$('#excluir-email').click(function(){
	const contato = new ContatosController();
	contato.excluir_email();	
});

$('#add-telefone').click(function(){
	const contato = new ContatosController();
	contato.add_telefone();
});

$('#excluir-telefone').click(function(){
	const contato = new ContatosController();
	contato.excluir_telefone();	
});


$('#pesquisa').click(function(){
	var titulo = $('#titulo').val();
	alert('sadfd');
});

$('#btn-livro-inserir').click(function(){
	var livro = new LivroController();
	livro.inserirLivro();
});

$('#btn-livro-atualizar').click(function(){
	var livro = new LivroController();
	livro.atualizarLivro();
});


 $('.icone_menu').click(function() {
 	setTimeout(function(){
 		$(".text-item").toggleClass("invisible d-none");
 	},100);

 	setTimeout(function(){
 		$("nav.menu").toggleClass("exibe_menu");
 	},200);
});

