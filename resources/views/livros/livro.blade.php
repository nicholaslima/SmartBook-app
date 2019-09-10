
@extends('layout')

@section('titulo')
	<h1 class="text-capitalize font-weight-bold my-4 text-dark">{{  $livro->titulo }}</h1>
@endsection

@section('conteudo')
<div>
	<ul class="list-group">
		<li class="list-group-item text-capitalize"><b>id:</b> {{  $livro->id }}</li>
		<li class="list-group-item text-capitalize"><b>titulo:</b> {{  $livro->titulo }}</li>
		<li class="list-group-item text-capitalize"><b>autor:</b> {{  $livro->autor }}</li>
		<li class="list-group-item text-capitalize"><b>data:</b> {{  $livro->data }}</li>
		<li class="list-group-item text-capitalize"><b>paginas:</b> {{  $livro->paginas }}</li>
		<li class="list-group-item text-capitalize"><b>categoria:</b> {{  $livro->categoria }}</li>
	</ul>
	<div class="my-2 float-right row">
		<button class="btn btn-danger text-capitalize btn-lg mx-1" data-target="#modal-excluir" data-toggle="modal">deletar</button>
		<form action="/cadastro_livro" method="post">
			@csrf
			<input type="hidden" value="{{ $livro->id  }}" name="id">
			<button type="submit" class="btn btn-primary text-capitalize btn-lg">atualizar</div>
		</form>
		
	</div>


	<div class="modal fade" id="modal-excluir">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title text-capitalize">excluir</h3>
						<button class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="text-capitalize">tem certeza que deseja excluir o livro <b>{{ $livro->titulo }}</b>?</p>
					</div>
					<div class="modal-footer">
						<form action="/excluir_livro" method="post">
							 @method('DELETE')
							@csrf
							<button type="submit" class="btn btn-primary btn-lg ">sim</button>
							<input type="hidden" name="id" value="{{ $livro->id }}">
						</form>
						
						<button class="btn btn-dark btn-lg col-md-2" data-dismiss="modal">fechar</button>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection