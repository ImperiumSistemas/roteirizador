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
Route::get('/layout/editar/veiculo/{id}', ['as' => 'layout.editarVeiculo', 'uses' => 'VeiculosController@editar']);
Route::put('/layout/atualizar/veiculo/{id}',['as' => 'layout.atualizarVeiculo', 'uses' => 'VeiculosController@atualizar']);
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

Route::get('listagemCidades', ['as' => 'listagem.cidade', 'uses' => 'CidadesController@listaCidade']);
Route::get('/layout/adicionarCidade', ['as' => 'layout.adicionarCidade', 'uses' => 'CidadesController@adicionar']);
Route::post('/layout/salvarCidade', ['as' => 'layout.salvarCidade', 'uses' => 'CidadesController@salvar']);
Route::get('layout/editarCidade/{id}', ['as' => 'layout.editarCidade', 'uses' => 'CidadesController@editar']);
Route::put('layout/atualizarCidade/{id}', ['as' => 'layout.atualizarCidade', 'uses' => 'CidadesController@atualizar']);
Route::get('layout/excluirCidade/{id}', ['as' => 'layout.excluirCidade', 'uses' => 'CidadesController@excluir']);
Route::get('layout/ativarCidade/{id}', ['as' => 'ativarCidade', 'uses' => 'CidadesController@ativar']);
Route::get('layout/desativarCidade/{id}', ['as' => 'desativarCidade', 'uses' => 'CidadesController@desativar']);


Route::get('listagemPais', ['as' => 'listagem.pais', 'uses' => 'PaisController@listaPais']);
Route::get('/layout/adicionarPais', ['as' => 'layout.adicionarPais', 'uses' => 'PaisController@adicionar']);
Route::post('/layout/salvarPais', ['as' => 'layout.salvarPais', 'uses' => 'PaisController@salvar']);
Route::get('/layout/editarPais/{id}', ['as' => 'layout.editarPais', 'uses' => 'PaisController@editar']);
Route::put('/layout/atualizarPais/{id}', ['as' => 'layout.atualizarPais', 'uses' => 'PaisController@atualizar']);
Route::get('layout/excluirPais/{id}', ['as' => 'layout.excluirPais', 'uses' => 'PaisController@excluir']);
Route::get('layout/ativarPais/{id}', ['as' => 'ativarPais', 'uses' => 'PaisController@ativar']);
Route::get('layout/desativarPais/{id}', ['as' => 'desativarPais', 'uses' => 'PaisController@desativar']);

Route::get('listagemEstado', ['as' => 'listagem.estado', 'uses' => 'EstadoController@listaEstado']);
Route::get('/layout/adicionarEstado', ['as' => 'layout.adicionarEstado', 'uses' => 'EstadoController@adicionar']);
Route::post('/layout/salvarEstado', ['as' => 'layout.salvarEstado', 'uses' => 'EstadoController@salvar']);
Route::get('/layout/editarEstado/{id}', ['as' => 'layout.editarEstado', 'uses' => 'EstadoController@editar']);
Route::put('layout/atualizarEstado/{id}', ['as' => 'layout.atualizarEstado', 'uses' => 'EstadoController@atualizar']);
Route::get('/layout/deletarEstado/{id}', ['as' => 'layout.deletarEstado', 'uses' => 'EstadoController@delete']);
Route::get('/layout/ativarPais/{id}', ['as' => 'ativarEstado', 'uses' => 'EstadoController@ativar']);
Route::get('/layout/desativarEstado/{id}', ['as' => 'desativarEstado', 'uses' => 'EstadoController@desativar']);

Route::get('listagemBairros', ['as' => 'listagem.bairros', 'uses' => 'BairroController@listaBairro']);
Route::get('/layout/adicionarBairro', ['as' => 'layout.adicionarBairro', 'uses' => 'BairroController@adicionar']);
Route::post('/layout/salvarBairro', ['as' => 'layout.salvarBairro', 'uses' => 'BairroController@salvar']);
Route::get('/layout/editarBairro/{id}', ['as' => 'layout.editarBairro', 'uses' => 'BairroController@editar']);
Route::put('/layout/atualizarBairro/{id}', ['as' => 'layout.atualizarBairro', 'uses' => 'BairroController@atualizar']);
Route::get('layout/excluirBairro/{id}', ['as' => 'layout.excluirBairro', 'uses' => 'BairroController@excluir']);


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
