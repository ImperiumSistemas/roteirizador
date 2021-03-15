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
    //return view('login.index');
});

Route:: get('/site', ['as' => 'site', 'uses' => 'RoteirizadorController@index'])->middleware('auth');
//Route::get('/login', ['as' => 'loginSistema', 'uses' => 'LoginController@login']);
//Route::get('/login/sair', ['as' => 'loginSair', 'uses' => 'LoginController@sair']);
//Route::post('login/entrar', ['as' => 'loginEntrar', 'uses' => 'LoginController@entrar']);

//Route::group(['middleware' => 'auth'], function(){

Route:: get('/listagemVeiculo',['as' => 'listagem.veiculo', 'uses' => 'VeiculosController@listaVeiculo' ]);
Route:: get('/layout/adcionarVeiculo',['as' =>'layout.adicionarVeiculo', 'uses' => 'VeiculosController@adicionar']);
Route:: post('/layout/salvar',['as' =>'layout.salvar', 'uses' => 'VeiculosController@salvar']);
Route::get('/layout/editar/veiculo/{id}', ['as' => 'layout.editarVeiculo', 'uses' => 'VeiculosController@editar']);
Route::put('/layout/atualizar/veiculo/{id}',['as' => 'layout.atualizarVeiculo', 'uses' => 'VeiculosController@atualizarVeiculo']);
Route::get('/layout/deletarVeiculo/{id}', ['as' => 'layout.deletarVeiculo', 'uses' => 'VeiculosController@deletar']);
Route::get('layout/ativarVeiculo/{id}', ['as' => 'ativarVeiculo', 'uses' => 'VeiculosController@ativar']);
Route::get('layout/desativarVeiculo/{id}', ['as' => 'desativarVeiculo', 'uses' => 'VeiculosController@desativar']);


Route::get('listagem/motorista', ['as' => 'listagem.motorista', 'uses' => 'MotoristaController@listaMotorista']);
Route::get('/layout/adicionarMotorista', ['as' => 'layout.adicionarMotorista', 'uses' => 'MotoristaController@adicionarMotorista']);
Route::post('/layout/salvarMotorista', ['as' => 'layout.salvarMotorista', 'uses' => 'MotoristaController@salvarMotorista']);
Route::get('/layout/deletarMotorista/{id}', ['as' => 'layout.deleteMotorista', 'uses' => 'MotoristaController@deletar']);
Route::get('layout/editarMotorista/{id}', ['as' => 'layout.editarMotorista', 'uses' => 'MotoristaController@editar']);
Route::put('/layout/atualizarMotorista/{id}', ['as' => 'layout.atualizarMotorista', 'uses' => 'MotoristaController@atualizar']);
Route::get('layout/ativarMotorista/{id}', ['as' => 'ativarMotorista', 'uses' => 'MotoristaController@ativar']);
Route::get('layout/desativarMotorista/{id}', ['as' => 'desativarMotorista', 'uses' => 'MotoristaController@desativar']);

Route:: get('/listagemFiliais', ['as' => 'listagem.filiais', 'uses' => 'FiliaisController@listaFiliais']);
Route:: get('/layout/layout.adicionarFilial', ['as' => 'layout.adicionarFilial', 'uses' => 'FiliaisController@adicionar']);
Route:: post('layout/salvarFilial', ['as' => 'layout.salvarFilial', 'uses' => 'FiliaisController@salvar']);
Route:: get('layout/editar/{id}', ['as' => 'layout.editar', 'uses' => 'FiliaisController@editar']);
Route:: put('layout/atualizar/{id}', ['as' => 'layout.atualizar', 'uses' =>'FiliaisController@atualizar']);
Route:: get('layout/deleteFilial/{id}', ['as' =>'layoute.delete', 'uses' => 'FiliaisController@delete']);
Route:: get('layout/desativarFilial/{id}', ['as' => 'desativarFilial', 'uses' => 'FiliaisController@desativar']);
Route:: get('layout/ativarFilial/{id}', ['as' => 'ativarFilial', 'uses' => 'FiliaisController@ativar']);
Route::get('confirmarEnderecoMapaFilial/{id}', ['as' => 'confirmarEnderecoMapaFilial', 'uses' => 'ConfirmaEndereco@mostrarMapaFilial']);
Route::post('confirmaMapaFilial/{id}', ['as' => 'confirmaMapaFilial', 'uses' => 'ConfirmaEndereco@confirmaEnderecoFilial']);



Route::get('/listagemEmpresa', ['as' => 'listagem.empresa', 'uses' => 'EmpresaController@listaEmpresa']);
Route::get('/layout/adicionarEmpresa', ['as' => 'layout.adicionarEmpresa', 'uses' => 'EmpresaController@adicionar']);
Route::post('layout/salvarEmpresa', ['as' => 'layout.salvarEmpresa', 'uses' => "EmpresaController@salvar"]);
Route::get('layout/editarEmpresa/{id}', ['as' => 'layout.editarEmpresa', 'uses' => 'EmpresaController@editar']);
Route::put('layout/atualizarEmpresa/{id}', ['as' => 'layout.atualizarEmpresa', 'uses' => 'EmpresaController@atualizar']);
Route::get('layout/excluirEmpresa/{id}', ['as' => 'layout.excluirEmpresa', 'uses' => 'EmpresaController@excluir']);
Route::get('layout/ativarEmpresa/{id}', ['as' => 'ativarEmpresa', 'uses' => 'EmpresaController@ativar']);
Route::get('layout/desativarEmpresa/{id}', ['as' => 'desativarEmpresa', 'uses' => 'EmpresaController@desativar']);


Route::get('/listagemRegiao', ['as' => 'listagem.regiao', 'uses' => 'RegiaoController@listaRegiao']);
Route::get('/layout/adicionarRegiao', ['as' => 'layout.adicionarRegiao', 'uses' => 'RegiaoController@adicionar']);
Route::post('layout/salvarRegiao', ['as' => 'layout.salvarRegiao', 'uses' => 'RegiaoController@salvar']);
Route::get('/layout/editarRegiao/{id}', ['as' => 'layout.editarRegiao', 'uses' => 'RegiaoController@editar']);
Route::put('/layout/atualizarRegiao/{id}', ['as' => 'layout.atualizarRegiao', 'uses' => 'RegiaoController@atualizar']);
Route::get('/layout/deletarRegiao/{id}', ['as' => 'layout.deletarRegiao', 'uses' => 'RegiaoController@deletar']);
Route::get('/layout/ativarRegiao/{id}', ['as' => 'ativarRegiao', 'uses' => 'RegiaoController@ativar']);
Route::get('/layout/desativarRegiao/{id}', ['as' => 'desativarRegiao', 'uses' => 'RegiaoController@desativar']);


Route::get('/listagemRota', ['as' => 'listagem.rota', 'uses' => 'RotaController@listaRota']);
Route::get('/layout/adicionarRota', ['as' => 'layout.adicionarRota', 'uses' => 'RotaController@adicionar']);
Route::post('layout/salvarRota', ['as' => 'layout.salvarRota', 'uses' => 'RotaController@salvar']);
Route::get('/layout/editarRota/{id}', ['as' => 'layout.editarRota', 'uses' => 'RotaController@editar']);
Route::put('/layout/atualizarRota/{id}', ['as' => 'layout.atualizarRota', 'uses' => 'RotaController@atualizar']);
Route::get('layou/excluirRota/{id}', ['as' => 'layout.excluirRota', 'uses' => 'RotaController@excluir']);
Route::get('layout/ativarRota/{id}', ['as' => 'ativarRota', 'uses' => 'RotaController@ativar']);
Route::get('layout/desativarRota/{id}', ['as' => 'desativarRota', 'uses' => 'RotaController@desativar']);

Route::get('/listagemPraca', ['as' => 'listagem.praca', 'uses' => 'PracaController@listaPraca']);
Route::get('/layout/adicionarPraca', ['as' => 'layout.adicionarPraca', 'uses' => 'PracaController@adicionar']);
Route::post('layout/salvarPraca', ['as' => 'layout.salvarPraca', 'uses' => 'PracaController@salvar']);
Route::get('/layout/editarPraca/{id}', ['as' => 'layout.editarPraca', 'uses' => 'PracaController@editar']);
Route::put('/layout/atualizarPraca/{id}', ['as' => 'layout.atualizarPraca', 'uses' => 'PracaController@atualizar']);
Route::get('/layout/excluirPraca/{id}', ['as' => 'layout.excluirPraca', 'uses' => 'PracaController@excluir']);
Route::get('/layout/ativarPraca/{id}', ['as' => 'ativarPraca', 'uses' => 'PracaController@ativar']);
Route::get('/layout/desativarPraca/{id}', ['as' => 'desativarPraca', 'uses' => 'PracaController@desativar']);


Route::get('listagemEndereco', ['as' => 'listagem.endereco', 'uses' => 'EnderecoController@listaEndereco']);
Route::get('/layout/adicionarEndereco', ['as' => 'layout.adicionarEndereco', 'uses' => 'EnderecoController@adicionar']);
Route::post('/layout/salvarEndereco', ['as' => 'layout.salvarEndereco', 'uses' => 'EnderecoController@salvar']);
Route::get('/layout/editarEndereco/{id}', ['as' => 'layout.editarEndereco', 'uses' => 'EnderecoController@editar']);
Route::put('/layout/atualizarEndereco/{id}', ['as' => 'layout.atualizarEndereco', 'uses' => 'EnderecoController@atualizar']);
Route::get('/layout/excluirEndereco/{id}', ['as' => 'layout.excluirEndereco', 'uses' => 'EnderecoController@excluir']);
Route::get('layout/ativarEndereco/{id}', ['as' => 'ativarEndereco', 'uses' => 'EnderecoController@ativar']);
Route::get('layout/desativarEndereco/{id}', ['as' => 'desativarEndereco', 'uses' => 'EnderecoController@desativar']);

Route::get('listagemPessoa', ['as' => 'listagem.pessoas', 'uses' => 'PessoasController@ListaPessoas']);
Route::get('/layout/adicionarPessoa/{id}', ['as' => 'layout.adicionarPessoaFisica', 'uses' => 'PessoasController@adicionar']);
Route::post('/layout/salvarPessoaFisica', ['as' => 'layout.salvarPessoaFisica', 'uses' => 'PessoasController@salvarPessoaFisica']);
Route::post('/layout/salvarPessoaJuridica', ['as' => 'layout.salvarPessoaJuridica', 'uses' => 'PessoasController@salvarPessoaJuridica']);
Route::get('/layout/editarPessoa/{id}', ['as' => 'layout.editarPessoa', 'uses' => 'PessoasController@editar']);
Route::put('/layout/atualizarPessoa/{id}', ['as' => 'layout.atualizarPessoa', 'uses' => 'PessoasController@atualizar']);
Route::get('/layout/excluirPessoa/{id}', ['as' => 'layout.excluirPessoa', 'uses' => 'PessoasController@excluir']);
Route::get('layout/ativarPessoa/{id}', ['as' => 'ativarPessoa', 'uses' => 'PessoasController@ativar']);
Route::get('layout/desativarPessoa/{id}', ['as' => 'desativarPessoa', 'uses' => 'PessoasController@desativar']);

Route::get('ListagemCliente', ['as' => 'listagemCliente', 'uses' => 'ClientesController@listaCliente']);
Route::get('/layout/adicionarCliente', ['as' => 'layout.adicionarCliente', 'uses' => 'ClientesController@adicionar']);
Route::post('/layout/salvarCliente', ['as' => 'layout.salvarCliente', 'uses' => 'ClientesController@salvar']);

Route::get('/layout/editarCliente/{id}', ['as' => 'layout.editarCliente', 'uses' => 'ClientesController@editar']);
Route::put('/layout/atualizarCliente/{id}', ['as' => 'layout.atualiarCliente', 'uses' => 'ClientesController@atualizar']);
Route::get('/layout/excluirCliente/{id}', ['as' => 'layout.excluirCliente', 'uses' => 'ClientesController@excluir']);
Route::get('layout/ativarCliente/{id}', ['as' => 'ativarCliente', 'uses' => 'ClientesController@ativar']);
Route::get('layout/desativarCliente/{id}', ['as' => 'desativarCliente', 'uses' => 'ClientesController@desativar']);


Route::get('listagem/confirmaEndereco', ['as' => 'listagem.confirmaEndereco', 'uses' => 'ConfirmaEndereco@lista']);
Route::get('confirmarEnderecoMapa/{id}', ['as' => 'confirmarEnderecoMapa', 'uses' => 'ConfirmaEndereco@mostrarMapa']);
Route::post('confirmaMapa/{id}', ['as' => 'confirmaMapa', 'uses' => 'ConfirmaEndereco@confirmaEndereco']);

// LOGIN

Route::get('novoLogin', ['as' => 'novoUsuário', 'uses' => 'LoginController@novoUsuario']);

// FIM LOGIN
//});

Route::get('geradorCarga', ['as' => 'geradorCarga', 'uses' => 'geradorCargaController@gerarCarga']);

Auth::routes();

Route::get('/home', 'LoginController@index');


Route::get('roteirizador', ['as' => 'roteirizador', 'uses' => 'geradorCargaController@roteirizador']);
Route::get('gerarCarga', ['as' => 'gerarCarga', 'uses' => 'geradorCargaController@gerarCarga']);
