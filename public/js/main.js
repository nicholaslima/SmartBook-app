


$('#add-email').click(function(){
	const contato = new ContatosController();
	contato.add_email();
});

$('#excluir-email').click(function(){
	const contato = new ContatosController();
	contato.excluir_email();	
});

$('#add-telefone').click(function(){
	var controller = new TelefonesController();
	controller.add_telefone();
});

$('#excluir-telefone').click(function(){
	var controller = new TelefonesController();
	controller.excluir_telefone();	
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
	var controller = new TelefonesController();
	controller.inserir_telefone();
});

listaQtd = $('#qtd_lista_telefone');
qtd = listaQtd.text();


$('.deletar-telefone').click(function(){
	id = $(this).children('p').text();
	li = $(this).parentsUntil('ul');
	var controller = new TelefonesController();
	controller.deletar_telefone(id,li);
});

$('.alterar-telefone').click(function()
{
	item = $(this).siblings('b');
	telefoneElemento = $(this).prev();
	telefone =  telefoneElemento.text();
	var controller = new TelefonesController();
	controller.inserir_form(telefone,telefoneElemento,item);
});

$('.atualizar-telefone').click(function(){
	elementos = $(this).parentsUntil('ul');
	telElemento = elementos.find('.telefoneInput');
	idElemento = elementos.find('.id_telefone');

	tel = telElemento.val();
	id = idElemento.text();
	
	console.log(id);
	console.log(tel);
	
	var controller = new TelefonesController();
	controller.atualizar_telefone(tel,id,telElemento);
});

$('#atualizar').click(function(){
	var contato = new ContatosController();
	contato.form_atualizar();
});

$("#salvar-alteracao-usuario").click(function(){
	var contato = new ContatosController();
	contato.atualizar_usuario();
});

$("#excluir-livros").click(function(){
	numLivros = $('#num_livros');
	num = numLivros.text();

	var ids = {};
	for(var i = 0;i < num;i++){
		livroId = $('#livro_'+i+':checked');
		var id = livroId.val();
		if(typeof id !== "undefined"){
			ids[i] = id;
		}
	};	

	var controller = new LivroController();
	controller.deletar(ids);
});


$('#reservar-livros').click(function(){
	numLivros = $('#num_livros');
	num = numLivros.text();

	var ids = {};
	for(var i = 0;i < num;i++){
		livroId = $('#livro_'+i+':checked');
		var id = livroId.val();
		if(typeof id !== "undefined"){
			ids[i] = id;
		}
	};	

	var controller = new LivroController();
	controller.reservar(ids);
});