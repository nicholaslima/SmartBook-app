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
Route::post('/inserir', 'livroController@store');
Route::any('/cadastro_livro','livroController@formulario');
Route::delete('/excluir_livro','livroController@destroy');
Route::post('/atualizar-livro','livroController@update');
Route::post('/livros_nome','livroController@pesquisa_por_nome');
Route::get('/pesquisa_livro','livroController@pesquisaLivro');
Route::post('/livros_pesquisa','livroController@pesquisa_Livros');

Route::get('/login', 'usuarioController@formulario_login');
Route::get('/cadastro_usuario', 'usuarioController@formulario');
Route::post('/inserir_usuario', 'usuarioController@store');
Route::post('/login', 'usuarioController@login');
Route::get('/lista_usuarios','usuarioController@index');
Route::get('/livros_reservados', 'usuarioController@livrosReservados');
Route::post('/reservar_livro', 'usuarioController@reservaLivro');
Route::post('/usuario', 'usuarioController@usuario');
Route::delete('/excluir_usuario','usuarioController@destroy');