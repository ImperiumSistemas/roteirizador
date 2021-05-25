<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Motoristas;
use App\Filiais;
use App\FiliaisMotoristas;
use App\filiais_motoristas;
use App\Pessoas;
use App\Fisicas;
use App\Juridicas;
use App\Enderecos;
use App\permissao_niveis_acessos;
use App\permissao_acessos;
use Carbon\Carbon;


class MotoristaController extends Controller
{
    //

    public function teste(){

      $motorista = Motoristas::all();
      return view('teste', compact('motorista'));
    }


    public function listaMotorista(){

      //$motoristas = Motoristas::all();
     /*$motoristas =  DB::table('motoristas')
           ->join('filiais_motoristas', 'motoristas.id', '=', 'filiais_motoristas.motorista_id')
           ->select('motoristas.*', 'filiais_motoristas.*')
           ->get();*/

          // $motoristas = Motoristas::all();

          $motoristas = DB::table('filiais_motoristas')
          ->join('motoristas', 'filiais_motoristas.MOTORISTA_id', '=', 'motoristas.id')
          ->join('filiais', 'filiais_motoristas.FILIAL_id', '=', 'filiais.id')
          ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
          ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
          ->select('motoristas.id as motoristaId', 'motoristas.ativoInativo as ativoInativo',
          'motoristas.dataInativacao as dataInativacao',  'motoristas.numero_cnh as numeroCnh',
          'motoristas.data_validade_cnh as dataValidadeCnh','filiais.descricao as descricao',
          'filiais.id as filialId',
          'pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numeroTelefone',
          'enderecos.bairro as bairro','enderecos.numero as numeroEndereco', 'enderecos.rua as rua',
          'enderecos.cidade as cidade','enderecos.estado as estado', 'enderecos.pais as pais')->get();

          $pessoas = Pessoas::all();

      return view('listagem.listagemMotorista', compact('motoristas', 'pessoas'));

    }

    public function adicionarMotoristaFisico(){

      $filiais = Filiais::all();

      return view('layout/adicionarMotoristaFisico', compact('filiais'));

    }

    public function adicionarMotoristaJuridico(){
      $filiais = Filiais::all();

      return view('layout.adicionarMotoristaJuridico', compact('filiais'));
    }

        public function salvarMotoristaFisico(Request $req){

          $dados = $req->all();

          $codMotorista = $dados['codMotorista'];
          $nomeMotorista = $dados['nome'];
          $numeroTelefone = $dados['numero_telefone'];
          $cpf = $dados['cpf'];
          $rg = $dados['rg'];
          $dataAdmissao = $dados['data_admissao'];
          $numeroCnh = $dados['numero_cnh'];
          $validadeCnh = $dados['data_validade_cnh'];
          $tipoContrato = $dados['tipo_contrato'];
          $rua = $dados['rua'];
          $numero = $dados['numero'];
          $bairro = $dados['bairro'];
          $cidade = $dados['cidade'];
          $estado = $dados['estado'];
          $pais = $dados['pais'];
          $cep = $dados['cep'];
          $idFilial = $dados['idFilial'];

          Pessoas::create(['nome' => $nomeMotorista, 'numero_telefone' => $numeroTelefone, 'ativoInativo' => 1]);
          $ultimoIdPessoa = Pessoas::all('id')->last(); // Pegando o Id da última pessoa cadastrada no banco de dados.

          Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id' => $ultimoIdPessoa->id]);

          Enderecos::create(['rua' => $rua, 'numero' => $numero, 'bairro' => $bairro, 'cep' => $cep, 'cidade' => $cidade, 'estado' => $estado, 'pais' => $pais,
                             'PESSOAS_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);

          Motoristas::create(['codMotorista' => $codMotorista, 'data_admissao' => $dataAdmissao, 'numero_cnh' => $numeroCnh, 'data_validade_cnh' => $validadeCnh,
                              'tipo_contrato' => $tipoContrato, 'PESSOAS_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);
          $ultimoIdMotorista = Motoristas::all('id')->last(); // Pegando o Id do último motorista cadastrado no banco de dados.

          foreach ($dados['idFilial'] as $filial) {

            filiais_motoristas::create(['FILIAL_id' => (int)$filial, 'MOTORISTA_id' => $ultimoIdMotorista->id]);

          }

          return redirect()->route('listagem.motorista');
        }

        public function salvarMotoristaJuridico(Request $req){
          $dados = $req->all();

          $codMotorista = $dados['codMotorista'];
          $nomeMotorista = $dados['nome'];
          $numeroTelefone = $dados['numero_telefone'];
          $cnpj = $dados['cnpj'];
          $razaoSocial = $dados['razao_social'];
          $dataAdmissao = $dados['data_admissao'];
          $numeroCnh = $dados['numero_cnh'];
          $validadeCnh = $dados['data_validade_cnh'];
          $tipoContrato = $dados['tipo_contrato'];
          $rua = $dados['rua'];
          $numero = $dados['numero'];
          $bairro = $dados['bairro'];
          $cidade = $dados['cidade'];
          $estado = $dados['estado'];
          $pais = $dados['pais'];
          $cep = $dados['cep'];
          $idFilial = $dados['idFilial'];

          Pessoas::create(['nome' => $nomeMotorista, 'numero_telefone' => $numeroTelefone, 'ativoInativo' => 1]);
          $ultimoIdPessoa = Pessoas::all('id')->last(); // Pegando o Id da última pessoa cadastrada no banco de dados.

          Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razaoSocial, 'PESSOAS_id' => $ultimoIdPessoa->id]);

          Enderecos::create(['rua' => $rua, 'numero' => $numero, 'bairro' => $bairro, 'cep' => $cep, 'cidade' => $cidade, 'estado' => $estado, 'pais' => $pais,
                             'PESSOAS_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);

          Motoristas::create(['codMotorista' => $codMotorista, 'data_admissao' => $dataAdmissao, 'numero_cnh' => $numeroCnh, 'data_validade_cnh' => $validadeCnh,
                              'tipo_contrato' => $tipoContrato, 'PESSOAS_id' => $ultimoIdPessoa->id, 'ativoInativo' => 1]);
          $ultimoIdMotorista = Motoristas::all('id')->last(); // Pegando o Id do último motorista cadastrado no banco de dados.

          foreach ($dados['idFilial'] as $filial) {

            filiais_motoristas::create(['FILIAL_id' => (int)$filial, 'MOTORISTA_id' => $ultimoIdMotorista->id]);

          }

          return redirect()->route('listagem.motorista');

        }


        public function editar($id){

          $motoristaFisicoJuridico = Motoristas::find($id);

          if($motoristaFisicoJuridico->fisicaJuridica == 1){

            $motorista = DB::table('motoristas')
            ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
            ->join('fisicas', 'fisicas.PESSOAS_id', '=', 'pessoas.id')
            ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
            ->select('pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numero_telefone',
                     'motoristas.codMotorista', 'motoristas.id as id', 'motoristas.data_admissao as data_admissao',
                     'motoristas.numero_cnh as numero_cnh', 'motoristas.data_validade_cnh as data_validade_cnh',
                     'motoristas.tipo_contrato as tipo_contrato', 'motoristas.fisicaJuridica as fisicaJuridica',
                     'fisicas.cpf as cpf', 'fisicas.rg as rg',
                     'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numero',
                     'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                     'enderecos.pais as pais')->where('motoristas.id', '=', $id)->first();

            $filiais = Filiais::all();

            return view('layout.editarMotorista', compact('motorista', 'filiais'));
          }

          if($motoristaFisicoJuridico->fisicaJuridica == 2){
            $filiais = Filiais::all();

            $motorista = DB::table('motoristas')
            ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
            ->join('juridicas', 'juridicas.PESSOAS_id', '=', 'pessoas.id')
            ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
            ->select('pessoas.nome as nome', 'pessoas.numero_telefone as numero_telefone',
                     'motoristas.codMotorista', 'motoristas.id as id', 'motoristas.data_admissao as data_admissao',
                     'motoristas.numero_cnh as numero_cnh', 'motoristas.data_validade_cnh as data_validade_cnh',
                     'motoristas.tipo_contrato as tipo_contrato', 'motoristas.fisicaJuridica as fisicaJuridica',
                     'juridicas.cnpj as cnpj', 'juridicas.razao_social as razao_social',
                     'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numero',
                     'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                     'enderecos.pais as pais')->where('motoristas.id', '=', $id)->first();

            return view('layout.editarMotorista', compact('motorista', 'filiais'));
          }

        }

        public function atualizar(Request $req, $id){

          $dados = $req->all();

          Motoristas::find($id)->update($dados);
          filiais_motoristas::where('MOTORISTA_id', '=', $id)->delete();

          $idMotorista = $id;

          foreach ($dados['idFilial'] as $filial) {

            filiais_motoristas::create(['FILIAL_id' => (int)$filial, 'MOTORISTA_id' => $idMotorista]);

          }

          return redirect()->route('listagem.motorista');
        }


        public function deletar($id){
            filiais_motoristas::where('MOTORISTA_id', '=', $id)->delete();
            Motoristas::where('id', '=', $id)->delete();
            return redirect()->route('listagem.motorista');

        }

        public function ativar($id){

          Motoristas::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
          return redirect()->route('listagem.motorista');
        }

        public function desativar($id){
          $data = Carbon::now();
          Motoristas::where('id', '=', $id)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
          return redirect()->route('listagem.motorista');
        }

        public function pesquisaMotoristaJuridico(Request $req){
          $cnpj = $req->cnpj;

          $motoristas = DB::table('motoristas')
          ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
          ->join('juridicas', 'juridicas.PESSOAS_id', '=', 'pessoas.id')
          ->select('pessoas.nome as nomeMotorista', 'pessoas.numero_telefone as telefoneMotorista',
                   'motoristas.codMotorista',
                   'juridicas.cnpj as cnpjMotorista', 'juridicas.razao_social as razao_social')->get();



          foreach($motoristas as $motorista){

            if($cnpj == $motorista->cnpjMotorista){

              $motorista = DB::table('motoristas')
              ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
              ->join('juridicas', 'juridicas.PESSOAS_id', '=', 'pessoas.id')
              ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
              ->select('pessoas.nome as nome', 'pessoas.numero_telefone as numero_telefone',
                       'motoristas.codMotorista', 'motoristas.id as id', 'motoristas.data_admissao as data_admissao',
                       'motoristas.numero_cnh as numero_cnh', 'motoristas.data_validade_cnh as data_validade_cnh',
                       'motoristas.tipo_contrato as tipo_contrato', 'motoristas.fisicaJuridica as fisicaJuridica',
                       'juridicas.cnpj as cnpj', 'juridicas.razao_social as razao_social',
                       'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numero',
                       'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                       'enderecos.pais as pais')->first();

              $filiais = Filiais::all();

              return view('layout.editarMotorista', compact('motorista', 'filiais'));

            }else {
              return redirect()->back();
            }
          }

          return redirect()->back();
        }

        public function pesquisaMotoristaFisico(Request $req){
          $cpfFormulario = $req->cpf;

          $motoristas = DB::table('motoristas')
          ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
          ->join('fisicas', 'fisicas.PESSOAS_id', '=', 'pessoas.id')
          ->select('pessoas.nome as nomeMotorista', 'pessoas.numero_telefone as telefoneMotorista',
                   'motoristas.codMotorista',
                   'fisicas.cpf as cpfMotorista', 'fisicas.rg as rgMotorista')->get();

          foreach($motoristas as $motorista){

            if($cpfFormulario == $motorista->cpfMotorista){
              $motorista = DB::table('motoristas')
              ->join('pessoas', 'motoristas.PESSOAS_id', '=', 'pessoas.id')
              ->join('fisicas', 'fisicas.PESSOAS_id', '=', 'pessoas.id')
              ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
              ->select('pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numero_telefone',
                       'motoristas.codMotorista', 'motoristas.id as id', 'motoristas.data_admissao as data_admissao',
                       'motoristas.numero_cnh as numero_cnh', 'motoristas.data_validade_cnh as data_validade_cnh',
                       'motoristas.tipo_contrato as tipo_contrato', 'motoristas.fisicaJuridica as fisicaJuridica',
                       'fisicas.cpf as cpf', 'fisicas.rg as rg',
                       'enderecos.rua as rua', 'enderecos.bairro as bairro', 'enderecos.numero as numero',
                       'enderecos.cidade as cidade', 'enderecos.cep as cep', 'enderecos.estado as estado',
                       'enderecos.pais as pais')->first();

            $filiais = Filiais::all();

            return view('layout.editarMotorista', compact('motorista', 'filiais'));

            }else{
              return redirect()->back();
            }
          }

           return redirect()->back();
        }
}
