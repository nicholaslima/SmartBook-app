		
@extends('layout')


@section('titulo')
	<h2 class="text-center titulo text-capitalize my-5">login de usuario</h2>
@endsection


@section('conteudo')
		<form method= "POST" action="/loginUser" class="form-cad d-flex flex-column container mx-auto my-5">
			<div class="col-md-9 ">
				<div class="form-inline">
					@csrf
					<label class="text-capitalize col-md-2">Login:</label> 
					<input type="text" size="55px" name="email" class="form-control col-md-10" required>
				</div>
				
				<div class="form-inline mt-3">
					<label class="text-capitalize col-md-2">senha:</label> 
					<input type="password" size="55px" name="password"  class="form-control col-md-10"  required>
				</div>

				<div class="my-4 float-right">
					<input class="btn-azul" type="submit" value="entrar"> 
					<input class="btn-red" type="reset" value="apagar"> 
				</div>
			</div>
		</form> 
@endsection
		