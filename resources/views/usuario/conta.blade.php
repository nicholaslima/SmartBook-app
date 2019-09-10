
@extends('layout')

@section('titulo')
	<h1>gerenciar usuario {{ $usuario->nome }} </h1>
@endsection

@section('conteudo')
<div>
	<ul class="list-group">
		<li class="list-group-item text-capitalize"><b>id:</b> {{  $usuario->id }}</li>
		<li class="list-group-item text-capitalize"><b>nome:</b> {{  $usuario->nome }}</li>
		<li class="list-group-item text-capitalize"><b>senha:</b> {{  $usuario->senha }}</li>
		<li class="list-group-item text-capitalize"><b>cpf:</b> {{  $usuario->cpf }}</li>
		<li class="list-group-item text-capitalize"><b>endereço:</b> {{  $usuario->endereco }}</li>
		<li class="list-group-item text-capitalize"><b>bairro:</b> {{  $usuario->bairro }}</li>
		<li class="list-group-item text-capitalize"><b>cidade:</b> {{  $usuario->cidade }}</li>
		<li class="list-group-item text-capitalize"><b>estado:</b> {{  $usuario->estado }}</li>
	</ul>
		<h2 class="text-capitalize py-2 my-2 bg-dark text-white px-2">telefones</h2>
	<ul class="list-group my-2">
	@foreach($telefones as $telefone)
		<li class="list-group-item text-capitalize d-flex justify-content-between">
			<div>
				<b>telefone:</b> {{  $telefone->numero }}
			</div>
			<div>
				<div class="btn btn-primary" id="deletar">deletar</div>
				<div class="btn btn-dark" id="atualizar">atualizar</div>
			</div>
		</li>
	@endforeach
		<p id="p-telefone"></p>
		
	</ul>
	<div class="btn btn-primary" id="add-telefone" class="add-botao"><i class="fa fa-plus"></i></div>
	<div class="btn btn-dark" id="excluir-telefone"><i class="fa fa-minus"></i></div>
	<div class="btn btn-primary text-capitalize float-right" id="inserir-telefone">inserir</div>

	<h4 class="text-capitalize py-2 my-2 bg-dark text-white px-2">emails</h4>
	<ul class="list-group my-2">
	@foreach($emails as $email)
		<li class="list-group-item text-capitalize d-flex justify-content-between">
			<div>
				<b>email:</b> {{  $email->email }}
			</div>
			<div>
				<div class="btn btn-primary" id="deletar">deletar</div>
				<div class="btn btn-dark" id="atualizar">atualizar</div>
			</div>
		</li>
	@endforeach
	</ul>



	<div class="my-2 float-right row">
		<button class="btn btn-danger text-capitalize btn-lg mx-1" data-target="#modal-excluir" data-toggle="modal">deletar</button>
		<form action="/" method="post">
			@csrf
			<input type="hidden" value="{{ $usuario->id  }}" name="id">
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
						<p class="text-capitalize">tem certeza que deseja excluir o usuario <b>{{ $usuario->nome }}</b>?</p>
					</div>
					<div class="modal-footer">
						<form action="/excluir_usuario" method="post">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn btn-primary btn-lg ">sim</button>
							<input type="hidden" name="id" value="{{ $usuario->id }}">
						</form>
						
						<button class="btn btn-dark btn-lg col-md-2" data-dismiss="modal">fechar</button>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection