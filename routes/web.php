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

Route::get('/anunciarProduto/{id}', 'ProdutoController@anunciar')->name('anunciar');

Route::get('/suspenderAnuncio/{id}', 'ProdutoController@suspender')->name('suspender');

Route::get('/', 'PagesController@index')->name('index');

Route::post('/login', 'GamerController@login')->name('login');

Route::get('/cadastroProduto/{id}', 'ClienteController@acessoCP')->name('cProduto');

Route::get('/logout', 'GamerController@logout')->name('logout');

Route::get('/meusProdutos/{id}', 'ClienteController@acessoMP')->name('mProduto');

Route::get('/atualizarCadastro/{idC}', 'ClienteController@edit')->name('aCadastro');

Route::get('/filtragem','ProdutoController@filtragem')->name('filtragem');

Route::get('/filtragemPad','ProdutoController@filtragemPadrao')->name('filtragemPad');

//Route::get('/atualizarGamer/{g}', 'GamerController@up');

Route::get('/cadastroCompleto/{id}', 'ClienteController@create')->name('cCadastro');

Route::get('/home','ProdutoController@ecommerce')->name('home');

Route::get('/pesquisa','ProdutoController@search')->name('search');

Route::get('/categoria/{idCat}','ProdutoController@searchCat')->name('categoria');

Route::get('/deletar/{idP}','ProdutoController@destroy')->name('deletar');

Route::get('/adicionar/{idP}','ProdutoController@addcarrinho')->name('adicionar');

Route::get('/carrinhoFinal/{idP}','ProdutoController@carrinhoFinal')->name('carrinhoFinal');

Route::get('/carrinho','ProdutoController@carrinho')->name('carrinho');

Route::get('/limparCar','ProdutoController@limparCar')->name('limparCar');

Route::get('/limparMod','ProdutoController@limparModal')->name('limparMod');

Route::get('/removerP/{idP}','ProdutoController@removerprod')->name('removerP');

Route::get('/removerMod/{idP}','ProdutoController@removerModal')->name('removerMod');

Route::get('/comprarP/{array}','ProdutoController@comprarProdutos')->name('comprarP');

Route::get('/paginaV/{idV}','ProdutoController@paginaVendedor')->name('paginaV');

Route::resource('gamer','GamerController');

Route::resource('produto','ProdutoController');

Route::resource('cliente','ClienteController');

Route::resource('avaliacao','AvaliacaoController');