<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\livrosRequest;
use App\Livro;

class livroController extends Controller
{
	public function __construct(Request $request){

	}
	public function lista()
	{
		$livros = Livro::all();

		return view('livros.lista',[
			'livros' => $livros
		]);
	}

	public function livro(Request $request)
	{
		$id = $request->id;
		$livro = Livro::find($id);
		return view('livros.livro',compact('livro'));
	}

	public function formulario(Request $request)
	{
		$id = $request->id;

		$livro = Livro::find($id);

		return view('livros.formulario',[
			'livro' => $livro
		]);
	}

	public function store(livrosRequest $request)
	{
		Livro::create($request->all());

		$request->session()
			->flash(
				'mensagem',
				'o livro foi adicionado com sucesso'
			);

		return redirect('/livros');
	}

	public function destroy(Request $request)
	{
		$id = $request->id;


		$exclusao = Livro::destroy($id);

		if ($exclusao) {
			$request->session()->flash('mensagem','o livro foi excluido com sucesso');
			return redirect('/');
		}else{
			$request->session()->flash('erro','o livro não foi excluido');
			return redirect('/');
		}
		
	}


	public function update(Request $request){
		$id = $request->id;

		$livro = Livro::find($id);

		$livro->titulo = $request->titulo;
		$livro->autor = $request->autor;
		$livro->data = $request->data;
		$livro->paginas = $request->paginas;
		$livro->categoria = $request->categoria;

		$salvo = $livro->save();

		if($salvo){
			$request->session()->flash('mensagem','livro atualizado com sucesso!!');
		}else{
			$request->session()->flash('erro','livro não foi atualizado!!');
		};
		

		return redirect('/livros');
	}

	public function pesquisa_por_nome(Request $request)
	{
		$titulo = $request->titulo;

		$livros = Livro::where('titulo',$titulo)->get();

		return view('livros.lista',[
			'livros' => $livros 
		]);
	}

	public function pesquisa_Livros(Request $request)
	{
		$titulo = $request->titulo;


		$livros = Livro::where('titulo',$titulo)->get();

		return json_encode($livros);
	}


	public function pesquisaLivro()
	{
		return view('livros.pesquisa');
	}
}