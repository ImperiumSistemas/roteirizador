<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Illuminate\View\View;
use App\Filiais;
use App\Rotas;
use App\Pracas;
use App\Regioes;
use App\Pedidos;
use App\Cargas;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class geradorCargaController extends Controller
{

    private $api;
    private $vehiclesRequired;
    private $qtdeVeiculos;
    private $qtdPedidos;
    private $deliveries;


    function __construct()
    {

        $this->api = new \GuzzleHttp\Client([
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'X-Auth-Client' => '',
                'X-Auth-Token' => ''
            ]
        ]);
    }

    public function filtros()
    {
        $filiais = Filiais::all();
        $rotas = Rotas::all();
        $pracas = Pracas::all();
        $regioes = Regioes::all();

        return View('layout.filtroMontagemCarga', compact('filiais', 'rotas', 'pracas', 'regioes'));
    }

    public function roteirizador()
    {


        return View('layout.mapa');
    }

    public function gerarCarga(Request $req)
    {

        $idFilial = $req->filial_id;
        $pracas = $req->idPracas;
        //$rotas = $req->idRotas;
        //$regioes = $req->idRegioes;
        $cubage = $req->cubage;
        $km = $req->km;
        $weight = $req->weight;
        $this->vehiclesRequired = $req->vehiclesRequired;
        $this->qtdeVeiculos = $req->qtde;
        $this->qtdPedidos = 0;
        $this->deliveries = $req->deliveries;

        //$DbPraca = Pracas::wherein('id', $pracas)->get();  Como fazer o select com whereIN e fazer isso com pedidos para filtrar
        $pedidos = Pedidos::where('codFilial', '=', $idFilial)
            ->where('podeFormarCarga', '=', 'S')
            ->wherein('codPraca', $pracas)
            ->get();
        //dd($pedidos);

        $dadosFiliais = Filiais::where('id', '=', $idFilial)->first();
        foreach ($pedidos as $pedido) {
            $endereco = DB::table('clientes')
                ->join('pessoas', 'pessoas.id', '=', 'clientes.PESSOA_id')
                ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                ->select('enderecos.latitude as lat', 'enderecos.longitude as lng',
                    'enderecos.rua as rua', 'enderecos.numero as numero', 'enderecos.bairro as bairro',
                    'enderecos.cidade as cidade')
                ->where('clientes.id', '=', $pedido->codCliente)->first();
            $coords = array("lat" => $endereco->lat, "lng" => $endereco->lng);
            $endCliente = $endereco->rua . ", " . $endereco->numero . ", " . $endereco->bairro . ", " . $endereco->cidade;
            $dimens = array("weight" => "100", "cubage" => "1000");
            $deliveres[] = array("id" => $pedido->id, "address" => $endCliente, "coords" => $coords, "dimens" => $dimens);
            $this->qtdPedidos = $this->qtdPedidos + 1;
        }

        $retornoValidacoes = $this->validacaoFiltros();
        if ($retornoValidacoes == false) {

            return redirect(route('filtros'))->with('error', 'Não existe quantidade de veiculos para os pedidos');
        } else {

        }

        $endFilial = $dadosFiliais->rua . ", " . $dadosFiliais->numero . ", " . $dadosFiliais->bairro . ", " . $dadosFiliais->cidade;
        $cd = array("address" => $endFilial, "lat" => $dadosFiliais->latitude, "lng" => $dadosFiliais->longitude);
        $vehicle = array("qtde" => $req->qtde, "weight" => $weight, "cubage" => $cubage, "deliveries" => $req->deliveries, "km" => $km, "time" => "100000000", "vehiclesRequired" => $this->vehiclesRequired);
        $data = array("cd" => $cd, "vehicle" => $vehicle);

        //dd($data);
        $arr = [
            "data" => [
                "cd" => $cd,
                "vehicle" => $vehicle,
                "deliveries" => $deliveres
            ]
        ];

        //dd($arr);
        try {

            $response = $this->api->POST('http://localhost:3000/roteirizador', [
                'json' => $arr
            ]);
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());

            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
        //echo $response->getBody();
        $resposta = $response->getBody();
        //dd($response);
        return view('layout.mapa', compact('resposta'));
    }

    public function salvarCargas(Request $req)
    {
        $cargasRecebidas = json_decode($req->cargas);

        foreach ($cargasRecebidas as $cargas) {
            foreach ($cargas as $carga) {
                $entregas = $carga->deliveries;
                Cargas::create(['status' => 'Criado']);
                $idCarga = Cargas::all('id')->last();
                $sequenciaEntrega = 0;
                foreach ($entregas as $entrega) {
                    $idPedido = $entrega->id;
                    if ($idPedido != '0') {
                        $sequenciaEntrega = $sequenciaEntrega + 1;

                        Pedidos::find($idPedido)->update(['cargas_id' => $idCarga->id, 'sequenciaEntrega' => $sequenciaEntrega, 'podeFormarCarga' => 'N', 'statusPedido' => 'M']);
                    }
                }
            }
        }

        dd("FEITO");
    }

    public function otimizaCargas(Request $req)
    {
        $cargasRecebidas = json_decode($req->cargasOtimizar);
        $entregasCarga = array();
        $idCarg = 0;
        $routes =array();
        $rotasFinais = array();
        //dd($cargasRecebidas);
        foreach ($cargasRecebidas as $cargas) {

            foreach ($cargas as $carga) {
                $vehicle = array("qtde" => '1', "weight" => '100000', "cubage" => '100000', "deliveries" => '1000', "km" => '10000000', "time" => "100000000", "vehiclesRequired" => '0');
                $entregasCarga = array();
                foreach ($carga->deliveries as $entrega) {
                    if ($entrega->id == 0) {
                        $cd = array("address" => $entrega->address, "lat" => $entrega->lat, "lng" => $entrega->lng);
                    } else {
                        $coords = array("lat" => $entrega->lat, "lng" => $entrega->lng);
                        $dimens = array("weight" => "100", "cubage" => "1000");
                        $entregasCarga[] = array("id" => $entrega->id, "address" => $entrega->address, "coords" => $coords, "dimens" => $dimens);

                    }
                }
                $romaneio = [
                    "data" => [
                        "cd" => $cd,
                        "vehicle" => $vehicle,
                        "deliveries" => $entregasCarga
                    ]
                ];

                $response = $this->api->POST('http://localhost:3000/roteirizador', [
                    'json' => $romaneio
                ]);

                $rota = json_decode($response->getBody());


                foreach ($rota as $roteiro) {

                    foreach ($roteiro as $resp) {
                        $idCarg = $idCarg + 1;
                        //echo($idCarg);
                        $entregasRoteiro = $resp->deliveries;
                        $routes [] = ["id" => $idCarg, "deliveries" => $entregasRoteiro];
                    }

                }
            }

        }
        $rotasFinais = ["routes" => $routes];
        //dd($rotasFinais);
        $resposta = json_encode($rotasFinais);

        return view('layout.mapa', compact('resposta'));

    }

    public function validacaoFiltros()
    {

        $retorno = true;
        if (($this->vehiclesRequired == 1) and (($this->qtdPedidos / $this->qtdeVeiculos) > $this->deliveries)) {
            $retorno = false;
            return $retorno;
        } else {
            return $retorno;
        }

    }


    public function otimizaCargasold(Request $req)
    {
        $cargasRecebidas = json_decode($req->cargasOtimizar);
        //dd($cargasRecebidas);
        $idCarg = 0;
        $deliveries = array();
        $routes =array ();

        foreach ($cargasRecebidas as $cargas) {
            foreach ($cargas as $carga) {
                $entregas = $carga->deliveries;
                //dd($entregas);
                $vehicle = array("qtde" => '1', "weight" => '100000', "cubage" => '100000', "deliveries" => '1000', "km" => '10000000', "time" => "100000000", "vehiclesRequired" => '0');
                foreach ($entregas as $entrega) {
                    if ($entrega->id == 0) {
                        $cd = array("address" => $entrega->address, "lat" => $entrega->lat, "lng" => $entrega->lng);
                    } else {
                        $coords = array("lat" => $entrega->lat, "lng" => $entrega->lng);
                        $dimens = array("weight" => "100", "cubage" => "1000");
                        $deliveries[] = array("id" => $entrega->id, "address" => $entrega->address, "coords" => $coords, "dimens" => $dimens);
                    }
                }
                $arr = [
                    "data" => [
                        "cd" => $cd,
                        "vehicle" => $vehicle,
                        "deliveries" => $deliveries
                    ]
                ];

                try {
                    $response = $this->api->POST('http://localhost:3000/roteirizador', [
                        'json' => $arr
                    ]);
                } catch (RequestException $e) {
                    echo Psr7\str($e->getRequest());
                    if ($e->hasResponse()) {
                        echo Psr7\str($e->getResponse());
                    }
                }


                //$resposta = $response->getBody();
                $rota = json_decode($response->getBody());


                foreach ($rota as $romaneio) {

                    foreach ($romaneio as $resp) {
                        $idCarg = $idCarg + 1;
                        //echo($idCarg);
                        $deliveries = $resp->deliveries;
                        $routes [] = ["id" => $idCarg, "deliveries" => $deliveries];
                    }
                }

            }
        }
        //dd($routes);
        $teste = ["routes" => $routes];
        dd($teste);
        $resposta = json_encode($teste);

        return view('layout.mapa', compact('resposta'));
    }
}