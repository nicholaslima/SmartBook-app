
@extends('layout')


@section('conteudo')

<main class="principal container">
	<div id="livro"></div>
	<div class="biblioteca-desc">
		<h1 class="titulo">smart book</h1>
		<div class="desc">Bem vindo! a nossa biblioteca online onde voce poderá se cadastrar para consultar livros e fazer sua reserva.
		</div>
		<a href="/livros" >
			<div class="btn-livros">livros<i class="fa fa-book" aria-hidden="true"></i>
			</div>
		</a>
		<a href="/pesquisa_livro" >
			<div class="btn-livros">pesquisa livros<i class="fa fa-book" aria-hidden="true"></i>
			</div>
		</a>
		<a href="/cadastro_usuario" >
			<div class="btn-cadastro">cadastrar usuario<i class="fa fa-folder-open-o" aria-hidden="true"></i>
			</div>
		</a>
		<a href="/login" >
			<div class="btn-cadastro">login<i class="fa fa-folder-open-o" aria-hidden="true"></i>
			</div>
		</a>
		<a href="/cadastro_livro" >
			<div class="btn-cadastro">cadastrar livro<i class="fa fa-folder-open-o" aria-hidden="true"></i>
			</div>
		</a>
	</div> 
</main>
@endsection