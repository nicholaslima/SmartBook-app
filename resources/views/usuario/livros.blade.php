
@extends('layout')

@section('titulo')
	<h2 class="titulo my-3">livros reservados</h2>
@endsection


@section('conteudo')
	<div>
		<ul class="list-group">
			@foreach($reservas as $reserva)
			<?php $livro = $reserva->livro; ?>
			<li class="list-group-item">
				livro {{ $livro->titulo }}
			</li>
			@endforeach
		</ul>
	</div>
@endsection