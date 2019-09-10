

@extends('layout')

@section('titulo')
	<h1 class="my-4 text-capitalize my-2"><?php if(isset($livro)){ echo 'atualizar livro';}else{ echo 'cadastrar livro';}  ?></h1>
@endsection

@section('conteudo')
	<form>
		@csrf
		<input type="hidden" name="id" id="id" value="<?php if(isset($livro->id)){ echo $livro->id;}else{ echo '';}  ?>">

		<input type="text" id="titulo" class="form-control my-2" name="titulo" placeholder="titulo" value="<?php if(isset($livro->titulo)){ echo $livro->titulo;}else{ echo '';}  ?>">

		<input type="text" id="autor" class="form-control my-2" name="autor" placeholder="autor" value="<?php if(isset($livro->titulo)){ echo $livro->autor;}else{ echo '';}  ?>">

		<input type="text" id="data" class="form-control my-2" name="data" placeholder="data" value="<?php if(isset($livro->titulo)){ echo $livro->data;}else{ echo '';}  ?>">

		<input type="text" id="paginas" class="form-control my-2" name="paginas" placeholder="paginas" value="<?php if(isset($livro->titulo)){ echo $livro->paginas;}else{ echo '';}  ?>">

		<input type="text" id="categoria" class="form-control my-2" name="categoria" placeholder="categoria" value="<?php if(isset($livro->titulo)){ echo $livro->categoria;}else{ echo '';}  ?>">

		
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
			<div class="btn btn-dark btn-lg" id="btn-livro-inserir">
				<span class="text-capitalize" id="texto-btn-inserir">
					cadastrar
				</span>
			</div>
		<?php 
			} 
		 if(!isset($livro)){    ?>
			<button class="btn btn-dark btn-lg" type="reset">apagar</button>
		<?php } ?>

		<p class="text-capitalize alert invisible my-3" id="msgUsuario"></p>
	</form>

@endsection