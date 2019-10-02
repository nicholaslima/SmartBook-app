
@extends('layout')

@section('titulo')
	<h2 class="titulo my-3">livros reservados</h2>
@endsection


@section('conteudo')
	<div>
		<ul class="list-group">
			@foreach($reservas as $reserva)
			<?php $livro = $reserva->livro; ?>
			<li class="list-group-item d-flex flex-row justify-content-between">
				<p><b>livro:</b> {{ $livro->titulo }}</p>
				<p><b>data reserva:</b> {{ $reserva->data_reserva }}</p>
				<p><b>data entrega:</b> {{ $reserva->data_entrega }}</p>
				<form action="/entrega_livro" method="POST">
					@csrf
					<input type="hidden" name="id_livro" value="{{ $livro->id }}">
					<button type="submit" class="btn btn-primary">entrega</button>
				</form>
			</li>
			@endforeach
		</ul>
	</div>
@endsection