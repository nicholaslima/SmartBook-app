
@extends('layout')

@section('titulo')
	<h3 class="titulo my-4 ">usuario {{ $usuario->nome }} </h3>
@endsection

@section('conteudo')
<div class="m-2">
	<ul class="list-group col-md-9">
		<li class="list-group-item text-capitalize">
			<div class="row d-flex justify-content-around">
				<b>id:</b>
				<p id="id_usuario">{{  $usuario->id }}</p>
			</div>
		</li>

		<li class="list-group-item ">
			<div class="row d-flex justify-content-around">
				<b >nome</b>
				<p id="nome">{{  $usuario->nome }}</p>
			</div>
		</li>
		<li class="list-group-item text-capitalize">
			<div class="row d-flex justify-content-around">
				<b>senha:</b> 
				<p id="senha">{{  $usuario->senha }}</p>
			</div>
		</li>
		<li class="list-group-item text-capitalize">
			<div class="row d-flex justify-content-around">
				<b>cpf:</b> 
				<p id="cpf">{{  $usuario->cpf }}</p>
			</div>
		</li>
		<li class="list-group-item text-capitalize">
			<div class="row d-flex justify-content-around">
				<b>endereço:</b> 
				<p id="endereco">{{  $usuario->endereco }}</p>
			</div>
		</li>
		<li class="list-group-item text-capitalize">
			<div class="row d-flex justify-content-around">
				<b>bairro:</b> 
				<p id="bairro">{{  $usuario->bairro }}</p>
			</div>
		</li>
		<li class="list-group-item text-capitalize">
			<div class="row d-flex justify-content-around">
				<b>cidade:</b> 
				<p id="cidade">{{  $usuario->cidade }}</p>
			</div>
		</li>
		<li class="list-group-item text-capitalize">
			<div class="row d-flex justify-content-around">
				<b>estado:</b> 
				<p id="estado">{{  $usuario->estado }}</p>
			</div>
		</li>
	</ul>

	<div class="row" id="btns-alteracao">
		<div class="btn-azul my-3 mr-2" id="atualizar">atualizar</div>
		<div class="btn btn-dark rounded-pill my-3 mr-2 px-4" id="salvar-alteracao-usuario">salvar</div>
	</div>
	
	<h5 class="text-capitalize p-3 my-3 bg-dark text-white rounded">telefones</h5>
	<ul class="list-group my-2" id="lista-telefones">
	@foreach($telefones as $telefone)
		<li class="list-group-item text-capitalize d-flex justify-content-between">
			<div class="d-flex row justify-content-between flex-fill">
				<b class="item-telefone">telefone:</b>
				<p class="telefone">{{  $telefone->numero }}</p> 
				<div class="btn btn-primary mr-4 alterar-telefone"><i class="fa fa-plus"></i></div>
			</div>
			<div>
				<div class="btn btn-primary deletar-telefone">deletar
					<p class="d-none invisible id_telefone">{{ $telefone->id }}</p>
				</div>

				<div class="btn btn-dark atualizar-telefone">atualizar	
				</div>
			</div>
		</li>
	@endforeach
		<input type="hidden" id="qtd_telefone" value="0">
	</ul>
		<p id="p-telefone"></p>
		@csrf
		<div class="btn btn-primary" id="add-telefone" class="add-botao"><i class="fa fa-plus"></i></div>
		<div class="btn btn-dark" id="excluir-telefone"><i class="fa fa-minus"></i></div>
		<div class="btn btn-primary text-capitalize float-right" id="inserir-telefone">inserir</div>

	<h5 class="text-capitalize p-3 my-3 bg-dark text-white rounded">emails</h5>
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




	<button class="btn btn-danger text-capitalize btn-lg mx-1" data-target="#modal-excluir-usuario" data-toggle="modal">deletar</button>

	<div class="modal fade" id="modal-excluir-usuario">
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