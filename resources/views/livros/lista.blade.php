@extends('layout')

@section('titulo')
	<h1 class="rosa my-3 titulo text-capitalize">livros</h1>
@endsection

@section('conteudo')
<div>
	<?php $num_livros = count($livros); ?>
	<p class="d-inline-block">N° livros: <p id="num_livros" class="d-inline-block mx-2"><?php echo $num_livros; ?></p></p>
	<ul class="list-group mx-auto">
		<?php $i = 0; ?>
		@foreach($livros as $livro)
			<li class="list-group-item">
				<div class="d-flex row justify-content-between align-items-md-around align-content-md-around">
					<p class="mx-3 text-capitalize">{{ $livro->titulo }}</p>
					<div class="row">
					@auth
						<input type="checkbox" id="livro_{{ $i }}" name="livro[]" class="livrosInput" value="{{ $livro->id }}">
					@endauth
						<form action="/livro" method="post" class="">
								@csrf
							<input type="hidden" name="id" value="{{ $livro->id }}">
							<button type="submit" class="mx-4 btn btn-primary text-capitalize">
								<i class="fa fa-external-link" aria-hidden="true"></i>
								detalhes
							</button>
						</form>
					@auth
						<form action="/reservar_livro" method="post" class="mr-2">
								@csrf
							<input type="hidden" name="id" value="{{ $livro->id }}">
							<button type="submit" class="mx-2 btn btn-dark text-capitalize">
								<i class="fa fa-external-link" aria-hidden="true"></i>
								reservar
							</button>
						</form>
					@endauth
					</div>
				</div>
			</li>
			<?php $i++; ?>
		@endforeach
	</ul>
		@auth
		<div class="btn btn-dark  my-2" id="excluir-livros">excluir</div>
		<div class="btn btn-dark  my-2" id="reservar-livros">reservar</div>
		@endauth		
</div>
@endsection


