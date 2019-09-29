@extends('layout')

@section('titulo')
	<h1 class="rosa my-3 titulo text-capitalize">livros</h1>
@endsection

@section('conteudo')
<div>
	<ul class="list-group mx-auto">
		@foreach($livros as $livro)
			<li class="list-group-item">
				<div class="d-flex row justify-content-between align-items-md-around align-content-md-around">
					<p class="mx-3 text-capitalize">{{ $livro->titulo }}</p>
					<div class="row">
					@auth
						<input type="checkbox" name="livro[]" class="livrosInput" value="{{ $livro->id }}">
					@endauth
						<form action="/livro" method="post" class="">
								@csrf
							<input type="hidden" name="id" value="{{ $livro->id }}">
							<button type="submit" class="mx-2 btn btn-primary text-capitalize">
								<i class="fa fa-external-link" aria-hidden="true"></i>
								detalhes
							</button>
						</form>

						<form action="/reservar_livro" method="post" class="mr-2">
								@csrf
							<input type="hidden" name="id" value="{{ $livro->id }}">
							<button type="submit" class="mx-2 btn btn-dark text-capitalize">
								<i class="fa fa-external-link" aria-hidden="true"></i>
								reservar
							</button>
						</form>
					</div>
				</div>
			</li>
		@endforeach
	</ul>
		@auth
		<div class="btn btn-dark btn-lg my-2" id="excluir-livros">excluir</div>
		<div class="btn btn-dark btn-lg my-2" id="excluir-livros">reservar</div>
		@endauth		
</div>
@endsection


