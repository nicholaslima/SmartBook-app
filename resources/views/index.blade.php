
@extends('layout')


@section('conteudo')

<main class="principal container">
	<div id="livro"></div>
	<div class="biblioteca-desc">
		<div class="my-3">
			<h1 class="titulo">smart book</h1>
			<div class="desc">Bem vindo! a nossa biblioteca online onde voce poderá se cadastrar para consultar livros e fazer sua reserva.
			</div>
		</div>
		
		<a href="/livros" >
			<div class="btn-azul">livros<i class="fa fa-book ml-1" aria-hidden="true"></i>
			</div>
		</a>

		<a href="/cadastro_usuario" >
			<div class="btn-red">sign up<i class="fa fa-folder-open-o ml-1" aria-hidden="true"></i>
			</div>
		</a>
		<a href="/login" >
			<div class="btn-red">login<i class="fa fa-folder-open-o ml-1" aria-hidden="true"></i>
			</div>
		</a>

	</div> 
</main>
@endsection