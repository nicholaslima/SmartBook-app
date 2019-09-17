<?php
namespace App\Http\Controllers;

use IlLuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Telefones;
use App\LivroUsuario;
use App\Helpers\CriadorTelefones;
use App\Helpers\ExclusaoUsuario;
use App\Helpers\CriadorEmails;

class usuarioController extends Controller
{
	public function index()
	{
		$usuarios = Usuario::all();

		return view('/usuario.lista',['usuarios' => $usuarios]);
	}

	public function pesquisa_nome()
	{
		$usuarios = Usuario::where('nome',$nome);

		return view('/usuario.lista',compact($usuarios));
	}
	public function formulario()
	{
		return view('usuario.formulario');
	}

	public function formulario_login()
	{
		return view('usuario.login-formulario');
	}


	public function store(Request $request)
	{
		$email = $request->email;


		$numero = $request->telefone;

		$qtd_telefones = $request->qtd_telefone;
		$qtd_email = $request->qtd_email;
		
		DB::beginTransaction();
			$usuario = Usuario::create([
				'nome' => $request->nome,
				'senha' => $request->senha,
				'cpf' => $request->cpf,
				'endereco' => $request->endereco,
				'bairro' => $request->bairro,
				'cidade' => $request->cidade,
				'estado' => $request->estado
			]);

			$CriadorTelefones = new CriadorTelefones();
			$CriadorEmails = new CriadorEmails();

			$CriadorTelefones->criarTelefones($qtd_telefones,$usuario,$request);

			$CriadorEmails->criarEmails($qtd_email,$request,$usuario);  
		DB::commit();

		$request->session()
			->flash(
				"mensagem",
				"$usuario->nome  cadastrado com sucesso"
			);

		return redirect('/login');
	}

	public function addTelefone(Request $request){
		$id_usuario = $request->id_usuario;
		$telefone = $request->telefone;

		Telefones::create([
			'numero' => $telefone,
			'usuario_id' => $id_usuario
		]);
	}

	public function excluirTelefone(Request $request){
		$id = $request->id_telefone;

		$telefone = Telefones::find($id);

		$telefone->delete();
	}

	public function usuario(Request $request)
	{
		$usuario = Usuario::find($request->id);

		$telefones = $usuario->Telefones()->get();
		$emails = $usuario->Emails()->get();

		return view('/usuario.conta',[
			'usuario' => $usuario,
			'telefones' => $telefones,
			'emails' => $emails
		]);

	}

	public function update(Request $request)
	{
		$usuario = Usuario::find($request->id);

		$usuario->nome = $request->nome;
		$usuario->senha = $request->senha;
		$usuario->cpf = $request->cpf;
		$usuario->endereco = $request->endereco;
		$usuario->bairro = $request->bairro;
		$usuario->cidade = $request->cidade;
		$usuario->estado = $request->estado;

		$usuario->save();
	}

	public function destroy(Request $request)
	{
		$id = $request->id;
		$usuario = Usuario::find($id);

		$telefones = $usuario->Telefones()->get();
		$emails = $usuario->Emails()->get();

		$exclusaoUsuario = new ExclusaoUsuario();
		
		$exclusaoUsuario->excluirUsuario($telefones,$emails,$usuario);


		$request->session()->flash("mensagem","$usuario->nome deletado com sucesso");

		return redirect('/lista_usuarios');
	}


	public function login(Request $request)
	{
		$email = $request->email;
		$senha = $request->senha;

		$usuario = DB::table('emails')->where('email',$email)->first();

		if(is_null($usuario)){
			$request->session()
				->flash(
					'mensagem',
					'email ou senha incorreta'
				);	

			return redirect('/');
		};

		$request->session()->flash('mensagem','login efetuado com sucesso');

		$request->session()->put('usuario','true');
		$request->session()->put('id_usuario',$usuario->id);

		return redirect('/livros');
	}

	public function reservaLivro(Request $request){
		$id_livro = $request->id_livro;
		$id_usuario = $request->session()->get('id_usuario');

		LivroUsuario::create([
			'livro_id' => $id_livro,
			'usuario_id' => $id_usuario,
		]);


		$request->session()->flash('mensagem','livro reservado com sucesso');

		return redirect('/');

	}

	public function livrosReservados(Request $request)
	{
		$id_usuario = $request->session()->get('id_usuario');
		$usuario_livros = LivroUsuario::where('usuario_id',$id_usuario)->get();
		
		$usuario->livros();

		return view('/usuario.livros',['livros' => $livros]);
	}


}