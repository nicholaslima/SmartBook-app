

@extends('layout')

@section('titulo')
	<h3 class="text-capitalize my-5">pesquisas de livros</h3>
@endsection


@section('conteudo')
	<div>
		<form method="post">
			<div class="row ">
				<div class="col-md-5">
					<div class="form-group">
						<label for="">titulo</label>
						<input name="titulo" type="text" id="titulo" class="form-control">
					</div>

					<div class="form-group">
						<label for="">ano</label>
						<input name="ano"type="text" class="form-control">
					</div>
			

					<div class="form-group">
						<label for="">autor</label>
						<input name="autor" type="text" class="form-control">
					</div>
				</div>
				
				<div class="col-md-5">
					<div class="form-group">
						<label for="">categoria</label>
						<input name="categoria" type="text" class="form-control">
					</div>

					<div>
						<label for="">data</label>
						<input name="data" type="text" class="form-control">
					</div>
				</div>
			</div>
			@csrf
		</form>
			<button id="pesquisa" class="text-capitalize btn btn-lg btn-dark my-2">pesquisa</button>
	</div>

	<ul>
		<li id="livros"></li>
	</ul>
@endsection