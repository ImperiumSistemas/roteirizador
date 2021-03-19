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
use Illuminate\Http\Request;


class geradorCargaController extends Controller
{
    private $api;

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
        $rotas = $req->idRotas;
        $regioes = $req->idRegioes;

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
        }


        $endFilial = $dadosFiliais->rua . ", " . $dadosFiliais->numero . ", " . $dadosFiliais->bairro . ", " . $dadosFiliais->cidade;
        $cd = array("address" => $endFilial, "lat" => $dadosFiliais->latitude, "lng" => $dadosFiliais->longitude);
        $vehicle = array("qtde" => $req->qtde, "weight" => "100000000", "cubage" => "1000000000", "deliveries" => $req->deliveries, "km" => "1000000", "time" => "100000000", "vehiclesRequired" => "1");
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





}
