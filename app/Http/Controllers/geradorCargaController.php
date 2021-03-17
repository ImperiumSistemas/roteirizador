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
        $idFilial = $req->filial_id;
        $pracas = $req->idPracas;
        $rotas = $req->idRotas;
        $regioes = $req->idRegioes;

        //$DbPraca = Pracas::wherein('id', $pracas)->get();  Como fazer o select com whereIN e fazer isso com pedidos para filtrar
        $pedidos = Pedidos::where('codFilial', '=',$idFilial)
                            ->where('podeFormarCarga','=','S')
                            ->wherein('codPraca', $pracas)
                            ->get();
        //dd($pedidos);

        $dadosFiliais = Filiais::where('id', '=', $idFilial)->first();
        foreach ($pedidos as $pedido) {
            $endereco = DB::table('clientes')
                ->join('pessoas', 'pessoas.id', '=', 'clientes.PESSOA_id')
                ->join('enderecos', 'enderecos.PESSOAS_id', '=', 'pessoas.id')
                ->select('enderecos.latitude as lat', 'enderecos.longitude as lng',
                        'enderecos.rua as rua','enderecos.numero as numero','enderecos.bairro as bairro',
                        'enderecos.cidade as cidade')
                ->where('clientes.id', '=' , $pedido->codCliente)->first();
            $coords = array("lat"=>$endereco->lat, "lng"=>$endereco->lng);
            $endCliente = $endereco->rua.", ".$endereco->numero.", ".$endereco->bairro.", ".$endereco->cidade;
            $dimens = array( "weight" => "100","cubage" => "1000");
        $deliveres[]= array("id"=>$pedido->id,"address"=>$endCliente,"coords"=>$coords,"dimens" =>$dimens);
        }

        $endFilial = $dadosFiliais->rua.", ".$dadosFiliais->numero.", ".$dadosFiliais->bairro.", ".$dadosFiliais->cidade;
        $cd = array("address"=>$endFilial, "lat"=>$dadosFiliais->latitude, "lng"=>$dadosFiliais->longitude);
        $vehicle = array("qtde"=>$req->qtde,"weight"=>"100000000", "cubage" => "1000000000", "deliveries" =>$req->deliveries,"km" => "1000000","time" => "100000000","vehiclesRequired" => "1");
        $data = array("cd"=>$cd, "vehicle"=>$vehicle);

        //dd($data);
        $arr = [
            "data" => [
                "cd"=>$cd,
                "vehicle"=>$vehicle,
                "deliveries" =>$deliveres
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


    public function arrExemplo()
    {
        $arrr = [
            "data" => [
                "cd" => [
                    "address" => "Avenida Visconde De Ibituruna, 399, Barreiro, Belo Horizonte",
                    "lat" => "-19.975875",
                    "lng" => "-44.015610"
                ],
                "vehicle" => [
                    "qtde" => "2",
                    "weight" => "100000000",
                    "cubage" => "1000000000",
                    "deliveries" => "20",
                    "km" => "1000000",
                    "time" => "100000000",
                    "vehiclesRequired" => "1"
                ],
                "deliveries" => [
                    [
                        "id" => "101",
                        "address" => "Rua Paraiba, 330, Funcionarios, Belo Horizonte",
                        "coords" => [
                            "lat" => "-19.928990",
                            "lng" => "-43.931740"
                        ],
                        "dimens" => [
                            "weight" => "100",
                            "cubage" => "1000"
                        ]
                    ],
                    [
                        "id" => "111",
                        "address" => "Avenida Olegario Maciel, 1600, Santo Agostinho, Belo Horizonte",
                        "coords" => [
                            "lat" => "-19.928966",
                            "lng" => "-43.946090"
                        ],
                        "dimens" => [
                            "weight" => "100",
                            "cubage" => "1000"
                        ]
                    ],
                    [
                        "id" => "111",
                        "address" => "Rua Xapuri, 172, Grajaú, Belo Horizonte",
                        "coords" => [
                            "lat" => "-19.941575",
                            "lng" => "-43.968900"
                        ],
                        "dimens" => [
                            "weight" => "100",
                            "cubage" => "1000"
                        ]
                    ],
                    [
                        "id" => "102",
                        "address" => "Praca Raul Soares, 12, Centro, Belo Horizonte",
                        "coords" => [
                            "lat" => "-19.922260",
                            "lng" => "-43.944680"
                        ],
                        "dimens" => [
                            "weight" => "100",
                            "cubage" => "1000"
                        ]
                    ],
                    [
                        "id" => "103",
                        "address" => "Rua Safira, 617, Prado, Belo Horizonte",
                        "coords" => [
                            "lat" => "-19.927334",
                            "lng" => "-43.964268"
                        ],
                        "dimens" => [
                            "weight" => "100",
                            "cubage" => "1000"
                        ]
                    ]
                ]
            ]
        ];
    }

}