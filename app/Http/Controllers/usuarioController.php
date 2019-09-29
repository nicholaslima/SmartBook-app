<?php
namespace App\Http\Controllers;

use IlLuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Telefones;
use App\Reservas;
use App\Helpers\CriadorTelefones;
use App\Helpers\ExclusaoUsuario;
use App\Helpers\CriadorEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Livro;

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
				'cpf' => $request->cpf,
				'endereco' => $request->endereco,
				'bairro' => $request->bairro,
				'cidade' => $request->cidade,
				'estado' => $request->estado
			]);

			$senha = $request->senha;
			$senha = Hash::make($senha);

			User::create([
				'email' => $request->username,
				'password' => $senha
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

		return redirect('/entrar');
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

	public function atualizar_telefone(Request $request){
		$id = $request->id_telefone;
		$id_usuario = $request->id_usuario;

		$telefone = Telefones::find($id);

		$telefone->usuario_id = $request->id_usuario;
		$telefone->numero = $request->numero;

		$telefone->save();
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


	public function loginUser(Request $request)
	{
		$email = $request->email;
		$senha = $request->password;

		if(!auth::attempt([
			'email' => $email,
			'password' => $senha
		])){
			$request->session()->flash('mensagem',
				'login ou senha incorretas'
			);
			
			return redirect()
				->back();
		};

		$request->session()->flash('mensagem',
			'login do usuario realizado com sucesso'
		);

		return redirect('/livros');
	}

	public function reservaLivro(Request $request){

		$id_livro = $request->id;
		$id_user = Auth::User()->id;
		$user = Auth::User();

		$livro = Livro::where('id', $id_livro)
					->update(['reservado' => true]);

		Reservas::create([
			'livro_id' => $id_livro,
			'user_id' => $id_user,
			'data_reserva' => date('d/m/y'),
			'data_entrega' => date('d/m/y')
		]);

		$request->session()->flash('mensagem','livro reservado com sucesso');

		return redirect('/livros');

	}

	public function livrosReservados(Request $request)
	{

		$user = auth::User();
		$reservas = $user->reservas()->get();

		return view('/usuario.livros',['reservas' => $reservas]);
	}


}