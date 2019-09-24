<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'indexController@index');

Route::post('/livro', 'livroController@livro');

Route::get('/livros', 'livroController@lista');

Route::post('/inserir', 'livroController@store')
		->middleware('auth');

Route::any('/cadastro_livro','livroController@formulario')
		->middleware('auth');

Route::delete('/excluir_livro','livroController@destroy');
Route::post('/atualizar-livro','livroController@update');
Route::post('/livros_nome','livroController@pesquisa_por_nome');
Route::get('/pesquisa_livro','livroController@pesquisaLivro');
Route::post('/livros_pesquisa','livroController@pesquisa_Livros');
Route::post('/deletar_livros','livroController@deletar_livros');


Route::post('/inserir_telefone','usuarioController@addTelefone');
Route::post('/atualizar_usuario','usuarioController@update');
Route::post('/excluir_telefone','usuarioController@excluirTelefone');
Route::post('/atualizar_telefone','usuarioController@atualizar_telefone');

Route::get('/entrar', 'usuarioController@formulario_login')
		->name('entrar');

Route::get('/cadastro_usuario', 'usuarioController@formulario');
Route::post('/inserir_usuario', 'usuarioController@store');
Route::post('/loginUser', 'usuarioController@loginUser');

Route::get('/lista_usuarios','usuarioController@index')
		->middleware('auth');

Route::get('/livros_reservados', 'usuarioController@livrosReservados')
		->middleware('auth');

Route::post('/reservar_livro', 'usuarioController@reservaLivro')
		->middleware('auth');

Route::post('/usuario', 'usuarioController@usuario')
		->middleware('auth');

Route::delete('/excluir_usuario','usuarioController@destroy')
		->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sair',function(){
	\Illuminate\Support\Facades\Auth::logout();
	return redirect('/entrar');
});
