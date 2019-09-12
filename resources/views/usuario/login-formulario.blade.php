		
@extends('layout')


@section('titulo')
	<h1 class="text-center text-capitalize my-5">login de usuario</h1>
@endsection


@section('conteudo')
		<form method= "POST" action="/login" class="form-cad d-flex flex-column ">
			<div class="form-inline">
				@csrf
				<label class="text-capitalize col-md-2">Login:</label> 
				<input type="text" size="55px" name="email" class="form-control col-md-10" required>
			</div>
			
			<div class="form-inline mt-3">
				<label class="text-capitalize col-md-2">senha:</label> 
				<input type="password" size="55px" name="senha"  class="form-control col-md-10"  required>
			</div>

			<div class="my-3">
				<input class="btn-azul" type="submit" value="entrar"> 
				<input class="btn-red" type="reset" value="apagar"> 
			</div>
		</form> 
@endsection
		