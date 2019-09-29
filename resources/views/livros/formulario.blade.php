

@extends('layout')

@section('titulo')
	<h1 class="my-4 text-capitalize my-2"><?php if(isset($livro)){ echo 'atualizar livro';}else{ echo 'cadastrar livro';}  ?></h1>
@endsection

@section('conteudo')
	<form>
		@csrf
		<input type="hidden" name="id" id="id" value="<?php if(isset($livro->id)){ echo $livro->id;}else{ echo '';}  ?>">
		
		<div class="form-inline">
			<label for="" class="col-md-2 text-capitalize">titulo</label>
			<input type="text" id="titulo" class="form-control my-2 col-md-10 form-control-lg" name="titulo" value="<?php if(isset($livro->titulo)){ echo $livro->titulo;}else{ echo '';}  ?>">
		</div>
		
		<div class="form-inline">
			<label for="" class="col-md-2 text-capitalize">autor</label>
			<input type="text" id="autor" class="form-control my-2 col-md-10 form-control-lg" name="autor" value="<?php if(isset($livro->titulo)){ echo $livro->autor;}else{ echo '';}  ?>">
		</div>

		<div class="form-inline">
			<label for="" class="col-md-2 text-capitalize">data</label>
			<input type="text" id="data" class="form-control my-2 col-md-10 form-control-lg" name="data" value="<?php if(isset($livro->titulo)){ echo $livro->data;}else{ echo '';}  ?>">
		</div>

		<div class="form-inline">
			<label for="" class="col-md-2 text-capitalize">paginas</label>
			<input type="text" id="paginas" class="form-control my-2 col-md-10 form-control-lg" name="paginas" value="<?php if(isset($livro->titulo)){ echo $livro->paginas;}else{ echo '';}  ?>">
		</div>

		<div class="form-inline">
			<label for="" class="col-md-2 text-capitalize">categoria</label>
			<input type="text" id="categoria" class="form-control my-2 col-md-10 form-control-lg" name="categoria" value="<?php if(isset($livro->titulo)){ echo $livro->categoria;}else{ echo '';}  ?>">
		</div>
		
		<?php 
			if(isset($livro)){
		?>
			<div class="btn btn-dark btn-lg" id="btn-livro-atualizar">
				<span class="text-capitalize" id="texto-btn-atualizar">
					atualizar
				</span>
			</div>
		<?php 
			}else{
		 ?>
		 <div class="my-2 float-right">
		 	<div class="btn btn-azul btn-lg" id="btn-livro-inserir">
				<span class="text-capitalize" id="texto-btn-inserir">
					cadastrar
				</span>
			</div>
		<?php 
			} 
		 if(!isset($livro)){    ?>
			<button class="btn btn-dark rounded-pill btn-lg" type="reset">apagar</button>
		<?php } ?>
		 </div>
		<p class="text-capitalize alert invisible my-3" id="msgUsuario"></p>
	</form>

@endsection