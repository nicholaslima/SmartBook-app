class LivroController
{
	constructor(){
		this._titulo = $('#titulo').val();
		this._autor = $('#autor').val();
		this._data = $('#data').val();
		this._paginas = $('#paginas').val();
		this._categoria = $('#categoria').val();

		livro = new Livro(
			this._titulo,
			this._autor,
			this._data,
			this._paginas,
			this._categoria
		);	
	}
		
	inserirLivro(){
		$.ajax({
			type: 'post',
			url: '/inserir',
			data:{
				titulo: livro.titulo,
				autor: livro.autor,
				data: livro.data,
				paginas: livro.paginas,
				categoria: livro.categoria
			},
			success: function(){
				console.log(livro);
			}
		});
	}
}