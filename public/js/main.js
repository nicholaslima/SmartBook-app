


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


$('#inserir-telefone').click(function(){
	var contato = new ContatosController();
	contato.inserir_telefone();
});

listaQtd = $('#qtd_lista_telefone');
qtd = listaQtd.text();


$('.del').click(function(){
	id = $(this).children('p').text();
	$(this).fadeOut('slow');
	li = $(this).parentsUntil('ul');
	console.log(id);
});


$('#atualizar').click(function(){
	var contato = new ContatosController();
	contato.form_atualizar();
});

$("#salvar-alteracao-usuario").click(function(){
	var contato = new ContatosController();
	contato.atualizar_usuario();
});