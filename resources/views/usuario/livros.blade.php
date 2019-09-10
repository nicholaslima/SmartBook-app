
@extends('layout')

@section('titulo')
	<h3>lisvros reservados</h3>
@endsection


@section('conteudo')
	<div>
		<ul class="list-group">
			@foreach($livros as $livro)
			<li class="list-group-item">{{ $livro->titulo }}</li>
			@endforeach
		</ul>
	</div>
@endsection