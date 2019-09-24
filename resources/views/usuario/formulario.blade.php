

@extends('layout')


@section('titulo')
	<h2 class="titulo text-capitalize my-4"> Cadastrar Usuário </h2>
@endsection


@section('conteudo')


<div class="container">
	<form method="POST" action="/inserir_usuario" >
			@csrf
			<div class="form-inline col-md-4">
				<label class="mr-3 col-md-1"> Nome: </label> 
				<input type="text"  name="nome" class="form-control-lg form-control col-md-10 m-1" required>
			</div>
			
			<div class="form-inline">

				<div class="form-group col-md-4">
					<label class="mr-3 col-md-1"> username: </label> 
					<input type="text" name="username" class="form-control-lg form-control m-1 col-md-10" required>
				</div>

				<div class="form-group col-md-4">
					<label class="mr-3 col-md-1"> Senha: </label> 
					<input type="password" name="senha" class="form-control-lg form-control m-1 col-md-10" required>
				</div>
			</div>

			<div class="form-inline">
				<div class="form-inline col-md-4">
					<label class="mr-3 col-md-1"> CPF: </label> 
					<input type="text" name="cpf" class="form-control-lg form-control m-1 col-md-10" required>
				</div>

				<div class="form-inline col-md-4">
					<label class="mr-3 col-md-1"> Endereço: </label> 
					<input type="text" name="endereco"  class="form-control-lg form-control m-1 col-md-10" required>
				</div>

			</div>
			

			<div class="form-inline">
				<div class="form-inline col-md-4">
					<label class="mr-3 col-md-1"> Bairro: </label> 
					<input type="text" name="bairro"  class="form-control-lg form-control m-1 col-md-10" required>
				</div>
				
				<div class="form-inline col-md-4">
					<label class="mr-3 col-md-1"> Cidade: </label> 
					<input type="text" name="cidade"  class="form-control-lg form-control m-1 col-md-10" required>
				</div>
			</div>
			
			<div class="form-inline col-md-4">
				<label class="mr-3 col-md-1"> Estado: </label> 
				<input type="text" name="estado" class="form-control-lg form-control col-md-10 m-1" required>
			</div>

			<div class="row my-2">
				<div class="col-md-5">
					<div class="row">
						<label class="mr-4"> E-mail: </label> 
						<div class="d-flex flex-column">
							<div class="d-flex flex-column mx-2">
								<input type="text" name="email-0" id="email"  class="form-control-lg form-control" required>
								<input type="hidden" id="qtd_email" name="qtd_email" value="0">
								<p id="p-email" class=""></p>
							</div>
						</div>
						<div>
							<div class="d-flex flex-row">
								<div class="btn btn-dark mx-1" id="add-email"><i class="fa fa-plus" ></i></div>
								<div class="btn btn-primary" id="excluir-email"><i class="fa fa-minus-square" ></i></div>
							</div>
						</div>
					</div>						
				</div>
				<div class="col-md-5">
					<div class="row">
						<label class=""> Telefone: </label> 
						<div class="d-flex flex-column">
							<div class="d-flex flex-column mx-2">
								<input type="text" name="telefone-0" id="telefone" class="form-control-lg form-control " required>
								<input type="hidden" id="qtd_telefone" name="qtd_telefone" value="0">
								<p id="p-telefone" class=""></p>
							</div>
						</div>
						<div>
							<div class="d-flex flex-row">
								<div class="btn btn-dark mx-1" id="add-telefone"><i class="fa fa-plus" ></i></div>
								<div class="btn btn-primary" id="excluir-telefone"><i class="fa fa-minus-square" ></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input class="btn-cadastro-azul float-right mr-5" type="submit" value="Cadastrar"> 
		</form> 
</div>

@endsection	
