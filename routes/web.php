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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', ['as' => 'teste.teste', 'uses' => 'MotoristaController@teste']);

Route:: get('/site', ['uses' => 'RoteirizadorController@index']);

Route:: get('/listagemVeiculo',['as' => 'listagem.veiculo', 'uses' => 'VeiculosController@listaVeiculo' ]);
Route:: get('/layout/adcionarVeiculo',['as' =>'layout.adicionarVeiculo', 'uses' => 'VeiculosController@adicionar']);
Route:: post('/layout/salvar',['as' =>'layout.salvar', 'uses' => 'VeiculosController@salvar']);
Route::get('layout/editar/veiculo/{id}', ['as' => 'layout.editarVeiculo', 'uses' => 'VeiculosController@editar']);
Route::put('layout/atualizar/veiculo/{id}',['as' => 'layout.atualizarVeiculo', 'uses' => 'VeiculosController@atualizar']);


Route::get('/listagem/motorista', ['as' => 'listagem.motorista', 'uses' => 'MotoristaController@listaMotorista']);
Route::get('layout/adicionarMotorista', ['as' => 'layout.adicionarMotorista', 'uses' => 'MotoristaController@adicionarMotorista']);
Route::post('layout/salvarMotorista', ['as' => 'layout.salvarMotorista', 'uses' => 'MotoristaController@salvarMotorista']);
Route::get('layout/deleteMotorista/{id}', ['as' => 'layout.deleteMotorista', 'uses' => 'MotoristaController@deletarMotorista']);


Route:: get('/listagemFiliais', ['as' => 'listagem.filiais', 'uses' => 'FiliaisController@listaFiliais']);
Route:: get('/layout/layout.adicionarFilial', ['as' => 'layout.adicionarFilial', 'uses' => 'FiliaisController@adicionar']);
Route:: post('layout/salvarFilial', ['as' => 'layout.salvarFilial', 'uses' => 'FiliaisController@salvar']);
Route:: get('layout/editar/{id}', ['as' => 'layout.editar', 'uses' => 'FiliaisController@editar']);
Route:: put('layout/atualizar/{id}', ['as' => 'layout.atualizar', 'uses' =>'FiliaisController@atualizar']);
Route:: get('layout/deleteFilial/{id}', ['as' =>'layoute.delete', 'uses' => 'FiliaisController@delete']);


Route::get('/listagemEmpresa', ['as' => 'listagem.empresa', 'uses' => 'EmpresaController@listaEmpresa']);
Route::get('/layout/adicionarEmpresa', ['as' => 'layout.adicionarEmpresa', 'uses' => 'EmpresaController@adicionar']);
Route::post('layout/salvarEmpresa', ['as' => 'layout.salvarEmpresa', 'uses' => "EmpresaController@salvar"]);
Route::get('layout/editarEmpresa/{id}', ['as' => 'layout.editarEmpresa', 'uses' => 'EmpresaController@editar']);
Route::put('layout/atualizarEmpresa/{id}', ['as' => 'layout.atualizarEmpresa', 'uses' => 'EmpresaController@atualizar']);
Route::get('layout/excluirEmpresa/{id}', ['as' => 'layout.excluirEmpresa', 'uses' => 'EmpresaController@excluir']);


Route::get('/listagemRegiao', ['as' => 'listagem.regiao', 'uses' => 'RegiaoController@listaRegiao']);
Route::get('/layout/adicionarRegiao', ['as' => 'layout.adicionarRegiao', 'uses' => 'RegiaoController@adicionar']);
Route::post('layout/salvarRegiao', ['as' => 'layout.salvarRegiao', 'uses' => 'RegiaoController@salvar']);
Route::get('layout/editarRegiao/{id}', ['as' => 'layout.editarRegiao', 'uses' => 'RegiaoController@editar']);
Route::put('layout/atualizarRegiao/{id}', ['as' => 'layout.atualizarRegiao', 'uses' => 'RegiaoController@atualizar']);
Route::get('layout/deletarRegiao/{id}', ['as' => 'layout.deletarRegiao', 'uses' => 'RegiaoController@deletar']);


Route::get('/listagemRota', ['as' => 'listagem.rota', 'uses' => 'RotaController@listaRota']);
Route::get('/layout/adicionarRota', ['as' => 'layout.adicionar', 'uses' => 'RotaController@adicionar']);
Route::post('layout/salvarRota', ['as' => 'layout.salvar', 'uses' => 'RotaController@salvar']);
Route::get('/layout/editarRota/{id}', ['as' => 'layout.editar', 'uses' => 'RotaController@editar']);
Route::put('/layout/atualizarRota/{id}', ['as' => 'layout.atualizar', 'uses' => 'RotaController@atualizar']);
Route::get('layou/excluirRota/{id}', ['as' => 'layout.excluir', 'uses' => 'RotaController@excluir']);

Route::get('/listagemPraca', ['as' => 'listagem.praca', 'uses' => 'PracaController@listaPraca']);
Route::get('/layout/adicionarPraca', ['as' => 'layout.adicionarPraca', 'uses' => 'PracaController@adicionar']);
Route::post('layout/salvarPraca', ['as' => 'layout.salvarPraca', 'uses' => 'PracaController@salvar']);

Route::get('listagemCidades', ['as' => 'listagem.cidade', 'uses' => 'CidadesController@listaCidade']);
Route::get('/layout/adicionarCidade', ['as' => 'layout.adicionarCidade', 'uses' => 'CidadesController@adicionar']);
Route::post('/layout/salvarCidade', ['as' => 'layout.salvarCidade', 'uses' => 'CidadesController@salvar']);
Route::get('layout/editarCidade/{id}', ['as' => 'layout.editarCidade', 'uses' => 'CidadesController@editar']);
Route::put('layout/atualizarCidade/{id}', ['as' => 'layout.atualizarCidade', 'uses' => 'CidadesController@atualizar']);
Route::get('layout/excluirCidade/{id}', ['as' => 'layout.excluirCidade', 'uses' => 'CidadesController@excluir']);
