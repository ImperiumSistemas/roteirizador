<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class geradorCargaController extends Controller
{
    private $api;

    function __construct() {

        $this->api = new \GuzzleHttp\Client([
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'X-Auth-Client' => '',
                'X-Auth-Token' => ''
            ]
        ]);
    }

    public function gerarCarga(){

        $arr = [
            "data" =>[
                "cd"=> [
                    "address" => "Avenida Visconde De Ibituruna, 399, Barreiro, Belo Horizonte",
                    "lat" => "-19.975875",
                    "lng" => "-44.015610"
                ],
                "vehicle" => [
                    "qtde"=> "2",
                    "weight"=> "100000000",
                    "cubage" => "1000000000",
                    "deliveries" => "20",
                    "km"=> "1000000",
                    "time" => "100000000",
                    "vehiclesRequired"=> "1"
                ],
                "deliveries" => [
                  [
                    "id" => "101",
                    "address" => "Rua Paraiba, 330, Funcionarios, Belo Horizonte",
                    "coords" => [
                        "lat" => "-19.928990",
                        "lng" => "-43.931740"
                    ],
                    "dimens"=> [
                        "weight"=> "100",
                        "cubage"=> "1000"
                    ]
                ],
                  [
                    "id"=> "111",
                    "address"=> "Avenida Olegario Maciel, 1600, Santo Agostinho, Belo Horizonte",
                    "coords"=> [
                        "lat"=> "-19.928966",
                        "lng"=> "-43.946090"
                    ],
                    "dimens"=> [
                        "weight"=> "100",
                        "cubage"=> "1000"
                    ]
                ],
                [
                    "id"=> "111",
                    "address"=> "Rua Xapuri, 172, Grajaú, Belo Horizonte",
                    "coords"=> [
                        "lat"=> "-19.941575",
                        "lng"=> "-43.968900"
                    ],
                    "dimens"=> [
                        "weight"=> "100",
                        "cubage"=> "1000"
                    ]
                ],
                [
                    "id"=> "102",
                    "address"=> "Praca Raul Soares, 12, Centro, Belo Horizonte",
                    "coords"=> [
                        "lat"=> "-19.922260",
                        "lng"=> "-43.944680"
                    ],
                    "dimens"=> [
                        "weight"=> "100",
                        "cubage"=> "1000"
                    ]
                ],
                [
                    "id"=> "103",
                    "address"=> "Rua Safira, 617, Prado, Belo Horizonte",
                    "coords"=> [
                        "lat"=> "-19.927334",
                        "lng"=> "-43.964268"
                    ],
                    "dimens"=> [
                        "weight"=> "100",
                        "cubage"=> "1000"
                    ]
                ]

              ]
            ]

        ];

        try {

            $response = $this->api->POST('http://localhost:3000/roteirizador', [
                'json' => $arr
            ]);

        } catch (RequestException $e){
            echo Psr7\str($e->getRequest());

            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
        echo $response->getBody();
    }

}
