<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pessoas;
use \App\Fisicas;
use \App\Juridicas;
use \App\Enderecos;
use \App\Clientes;
use \App\Motoristas;
use \App\permissao_niveis_acessos;
use \App\permissao_acessos;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PessoasController extends Controller {

    //

    public function listaPessoas() {
        $query = Pessoas::query();
        $query->orderBy('pessoas.nome');
        $query->leftJoin('juridicas', 'pessoas.id', '=', 'juridicas.PESSOAS_id');
        $query->leftJoin('fisicas', 'pessoas.id', '=', 'fisicas.PESSOAS_id');
        $query->leftjoin('enderecos', 'pessoas.id', '=', 'enderecos.pessoas_id');
        $query->where('pessoas.ativoInativo', '<>', '0');
        $query->select('pessoas.id', 'pessoas.ativoInativo as ativoInativo', 'pessoas.dataInativacao as dataInativacao',
                'pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numeroTelefone',
                DB::raw('coalesce(juridicas.cnpj, fisicas.cpf,0) as cpf_CNPJ'), 'juridicas.razao_social as razaoSocial', 'fisicas.rg as rg',
                'enderecos.rua', 'enderecos.bairro', 'enderecos.numero', 'enderecos.cidade', 'enderecos.estado',
                'enderecos.pais',
                db::raw('case when fisicas.id is null then "JURIDICA" else "FISICA" end as tipo_pessoa'));
        $listagens = $query->paginate(10);
        //dd($listagens);
        //return view('listagem.listaPessoas', compact('pessoaFisica', 'pessoaJuridica', 'juridicaFisica', 'listagens'));
        return view('listagem.listaPessoas', compact('listagens'));
    }

    public function listaPessoasFIltro(Request $req) {
        

        $query = Pessoas::query();
        $query->orderBy('pessoas.nome');
        $query->leftJoin('juridicas', 'pessoas.id', '=', 'juridicas.PESSOAS_id');
        $query->leftJoin('fisicas', 'pessoas.id', '=', 'fisicas.PESSOAS_id');
        $query->leftjoin('enderecos', 'pessoas.id', '=', 'enderecos.pessoas_id');
        if ($req->status == 0) {
            $query->where('pessoas.ativoInativo', '=', '0');
        } elseif ($req->status == 1) {
            $query->where('pessoas.ativoInativo', '<>', '0');
        } else {
            //sem where
        }
        
        if($req->nomeCliente != "null"){
             $query->where('pessoas.nome', 'like', '%'.$req->nomePessoa.'%');
        }
        
        $query->select('pessoas.id', 'pessoas.ativoInativo as ativoInativo', 'pessoas.dataInativacao as dataInativacao',
                'pessoas.nome as nomePessoa', 'pessoas.numero_telefone as numeroTelefone',
                DB::raw('coalesce(juridicas.cnpj, fisicas.cpf,0) as cpf_CNPJ'), 'juridicas.razao_social as razaoSocial', 'fisicas.rg as rg',
                'enderecos.rua', 'enderecos.bairro', 'enderecos.numero', 'enderecos.cidade', 'enderecos.estado',
                'enderecos.pais',
                db::raw('case when fisicas.id is null then "JURIDICA" else "FISICA" end as tipo_pessoa'));
        $listagens = $query->paginate(10);
        //dd($listagens);
        //return view('listagem.listaPessoas', compact('pessoaFisica', 'pessoaJuridica', 'juridicaFisica', 'listagens'));
        return view('listagem.listaPessoas', compact('listagens'));
    }

    public function adicionar($id) {

        if ($id == 1) {

            return view('layout.adicionarPessoaFisica');
        }

        if ($id == 2) {
            return view('layout.adicionarPessoaJuridica');
        }
    }

    public function salvarPessoaFisica(Request $req){

        $nome = $req->nome;
        $telefone = $req->numero_telefone;
        $cpf = $req->cpf;
        $rg = $req->rg;
        $rua = $req->rua;
        $bairro = $req->bairro;
        $numero = $req->numero;
        $cidade = $req->cidade;
        $estado = $req->estado;
        $pais = $req->pais;
        $cep = $req->cep;
        $salvarEm = $req->salvarEm;


        if($salvarEm == 2){

            Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
            $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa.

            Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id'=> $ultimoId->id]);
            $Pessoas_id = $ultimoId->id;

            Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
                'estado'=>$estado, 'cep' => $cep, 'pais'=>$pais,'PESSOAS_id'=>$Pessoas_id, 'ativoInativo' => 1]);

            Clientes::create(['ativoInativo' => 1, 'PESSOA_id' => $ultimoId->id, 'PRACA_id' => 1]);

            return redirect()->route('listagem.pessoas');
        }

        if($salvarEm == 1){
            Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
            $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa.

            Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id'=> $ultimoId->id]);
            $Pessoas_id = $ultimoId->id;

            Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
                'estado'=>$estado, 'cep' => $cep, 'pais'=>$pais,'PESSOAS_id'=>$Pessoas_id, 'ativoInativo' => 1]);

            Motoristas::create();
        }

        Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
        $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa.

        Fisicas::create(['cpf' => $cpf, 'rg' => $rg, 'PESSOAS_id'=> $ultimoId->id]);
        $Pessoas_id = $ultimoId->id;

        Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
            'estado'=>$estado, 'cep' => $cep, 'pais'=>$pais,'PESSOAS_id'=>$Pessoas_id, 'ativoInativo' => 1]);
        return redirect()->route('listagem.pessoas');

    }


    public function salvarPessoaJuridica(Request $req){

        $nome = $req->nome;
        $telefone = $req->numero_telefone;
        $cnpj = $req->cnpj;
        $razaoSocial = $req->razao_social;
        $rua = $req->rua;
        $bairro = $req->bairro;
        $numero = $req->numero;
        $cidade = $req->cidade;
        $estado = $req->estado;
        $pais = $req->pais;
        $cep = $req->cep;
        $salvarEm = $req->salvarEm;

        if($salvarEm == 2){

            Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
            $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa (chave estrangeira)
            Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razaoSocial, 'PESSOAS_id' => $ultimoId->id ]);

            $Pessoas_id = $ultimoId->id;

            Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
                'cep' => $cep, 'estado'=>$estado,'pais'=>$pais,'PESSOAS_id'=> $Pessoas_id, 'ativoInativo' => 1]);

            Clientes::create(['ativoInativo' => 1, 'PESSOA_id' => $ultimoId->id, 'PRACA_id' => 1]);

            return redirect()->route('listagem.pessoas');
        }

        Pessoas::create(['nome' => $nome, 'numero_telefone' => $telefone, 'ativoInativo' => 1]);
        $ultimoId = Pessoas::all('id')->last(); // Pegando sempre o último ID cadastrado na hora do cadastro para poder vincular com a tabela pessoa (chave estrangeira)
        Juridicas::create(['cnpj' => $cnpj, 'razao_social' => $razaoSocial, 'PESSOAS_id' => $ultimoId->id ]);

        $Pessoas_id = $ultimoId->id;

        Enderecos::create(['rua'=>$rua, 'numero'=>$numero, 'bairro'=>$bairro, 'cidade'=>$cidade,
            'cep' => $cep, 'estado'=>$estado,'pais'=>$pais,'PESSOAS_id'=> $Pessoas_id, 'ativoInativo' => 1]);

        return redirect()->route('listagem.pessoas');
    }

    public function Editar(Request $req) {
        $id =$req->idPessoa;
        $tipoPessoa = $req->tipoPessoa;
         
        $pessoa = Pessoas::find($id);
        $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();
        $tipoPessoa = Fisicas::where('PESSOAS_id', '=', $id)->first();

        if ($tipoPessoa == 'FISICA') {
            
            $fisica = Fisicas::where('PESSOAS_id', '=', $id)->first();
            return view('layout.editarPessoaFisica', compact('pessoa', 'fisica', 'endereco'));
        } else {
            $juridica = Juridicas::where('PESSOAS_id', '=', $id)->first();
            return view('layout.editarPessoaJuridica', compact('pessoa', 'juridica', 'endereco'));
        }
    }

    public function atualizar(Request $req, $id){

        $nome = $req->nome;
        $telefone = $req->numero_telefone;
        $cnpj = $req->cnpj;
        $razaoSocial = $req->razao_social;
        $rua = $req->rua;
        $bairro = $req->bairro;
        $numero = $req->numero;
        $cidade = $req->cidade;
        $estado = $req->estado;
        $pais = $req->pais;
        $cep = $req->cep;

        $tipoPessoa = Fisicas::where('PESSOAS_id', '=', $id)->first();
        $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();

        if(isset($tipoPessoa->id)){
            $cpf = $req->cpf;
            $rg = $req->rg;

            Pessoas::find($id)->update(['nome' => $nome, 'numero_telefone' => $telefone]);
            Fisicas::find($tipoPessoa->id)->update(['cpf' => $cpf, 'rg' => $rg]);
            Enderecos::find($endereco->id)->update(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero,
                'cidade' => $cidade, 'cep' => $cep, 'estado' => $estado, 'pais' => $pais]);

            return redirect()->route('listagem.pessoas');

        }else {

            $cnpj = $req->cnpj;
            $razaoSocial = $req->razao_social;

            $tipoPessoa = Juridicas::where('PESSOAS_id', '=', $id)->first();
            $endereco = Enderecos::where('PESSOAS_id', '=', $id)->first();

            Pessoas::find($id)->update(['nome' => $nome, 'numero_telefone' => $telefone]);
            Juridicas::find($tipoPessoa->id)->update(['cnpj' => $cnpj, 'razao_social' => $razaoSocial]);
            Enderecos::find($endereco->id)->update(['rua' => $rua, 'bairro' => $bairro, 'numero' => $numero,
                'cidade' => $cidade, 'cep' => $cep, 'estado' => $estado, 'pais' => $pais]);

            return redirect()->route('listagem.pessoas');

        }
    }


    public function ativar($id) {
        Pessoas::where('id', '=', $id)->update(['ativoInativo' => 1, 'dataInativacao' => '']);
        return redirect()->route('listagem.pessoas');
    }

    public function desativar(Request $req) {

        $data = Carbon::now();
        Pessoas::where('id', '=', $req->idPessoaDesativar)->update(['ativoInativo' => 0, 'dataInativacao' => $data]);
        return redirect()->route('listagem.pessoas');
    }

}
