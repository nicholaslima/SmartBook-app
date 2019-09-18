<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>livros</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/geral.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>

	<header class="">
		<a href="/"><img src="{{ asset('imgs/logo_azul.jpeg') }}" alt="logo aplicativo" id="logo"></a>
		<div class="topo">
			<i class="fa fa-bars fa-2x icone_menu" aria-hidden="true"></i>
			<div class="form-search">
					<form class="form-input d-flex d-flex-row" method="post" action="/livros_nome">
						@csrf
						<input name="titulo" type="text" class="rounded-pill form-control" />
						<input type="submit" value="buscar" class="btn btn-success ml-2">
					</form>
			</div>
			<div class="icones">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<i class="fa fa-rss" aria-hidden="true"></i>
				<i class="fa fa-user-o" aria-hidden="true"></i>
			</div>
		</div>
		@if(session('mensagem'))
			<p class="alert alert-success">{{ session('mensagem') }}</p>
		@endif

		@if(session('erro'))
			<p class="alert alert-danger">{{ session('erro') }}</p>
		@endif

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</header>
	<div class="row">
		<div class="col-md-2">
			<nav class="menu ">
				<a href="/" class="item_menu py-1 d-flex d-flex-row ">
					<i class="fa fa-home p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >Home</p>
				</a>

				<a href="/livros" class="item_menu py-1 d-flex d-flex-row ">
					<i class="fa fa-list p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >Livros</p>
				</a>

				<a href="/cadastro_livro" class="item_menu py-1 d-flex d-flex-row ">
					<i class="fa fa-plus p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >adicionar livro</p>
				</a>

				<a href="/login" class="item_menu py-1 d-flex d-flex-row">
					<i class="fa fa-sign-in p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >login</p>
				</a>

				<a href="/lista_usuarios" class="item_menu py-1 d-flex d-flex-row">
					<i class="fa fa-users p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >usuarios</p>
				</a>

				<a href="/livros" class="item_menu py-1 d-flex d-flex-row">
					<i class="fa fa-search p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >pesquisar Livros</p>
				</a>

				<a href="/livros_reservados" class="item_menu py-1 d-flex d-flex-row">
					<i class="fa fa-book p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >Livros Alugados</p>
				</a>

				<a href="/cadastro_usuario" class="item_menu py-1 d-flex d-flex-row">
					<i class="fa fa-user-plus p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >Cadastrar aluno</p>
				</a>
				
				<a href="php/sair.php" class="item_menu py-1 d-flex d-flex-row">
					<i class="fa fa-sign-out p-2 fa-2x mt-2 ml-3"></i>
					<p class="text-item invisible mt-3 d-none" >Sair</p>
				</a>
			</nav>
		</div>
		

		<div class="col-md-10">
			@yield('titulo')
			@yield('conteudo')

		</div>
		<p class="msg alert position-absolute position-fixed invisible"></p>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('js/Models/Contato.js') }}"></script>
	<script src="{{ asset('js/Models/Livro.js') }}"></script>
	<script src="{{ asset('js/Views/telefonesView.js') }}"></script>
	<script src="{{ asset('js/Helper/alertas.js') }}"></script>
	<script src="{{ asset('js/Helper/ajax.js') }}"></script>
	<script src="{{ asset('js/Controllers/ContatosController.js') }}"></script>
	<script src="{{ asset('js/Controllers/TelefonesController.js') }}"></script>
	<script src="{{ asset('js/Controllers/LivroController.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>