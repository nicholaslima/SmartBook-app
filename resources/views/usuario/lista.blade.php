
@extends('layout')

@section('titulo')
	<h3 class="titulo my-4">lista de usuarios</h3>
@endsection

@section('conteudo')
	<div>
		<ul class="list-group">
			@foreach($usuarios as $usuario)
			<li class="list-group-item d-flex justify-content-between">
				<div class="">{{ $usuario->nome }}</div>
				<form action="/usuario" method="post" class="mx-2">
					@csrf
					<input type="hidden" name="id" value="{{ $usuario->id }}">
							
					<button type="submit" class="btn btn-dark ">
						<i class="fa fa-external-link" aria-hidden="true"></i>
						gerenciar
					</button>
				</form>
			</li>
			@endforeach
		</ul>
	</div>
@endsection