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
						<form action="/livro" method="post" class="mx-2">
							@csrf
							<input type="hidden" name="id" value="{{ $livro->id }}">
							
							<button type="submit" class="btn-azul text-capitalize">
									<i class="fa fa-external-link" aria-hidden="true"></i>
									detalhes
							</button>
						</form>

						<form action="/reservar_livro" method="post" class="mr-3" >
							@csrf
							<input type="hidden" name="id_livro" value="{{ $livro->id }}">
							<button type="submit" class="btn-preto  text-capitalize">
									<i class="fa fa-external-link" aria-hidden="true"></i>
									reservar
							</button>
						</form>
					</div>
				</div>
			</li>
		@endforeach
	</ul>


</div>
@endsection


