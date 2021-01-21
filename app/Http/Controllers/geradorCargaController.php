<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class geradorCargaController extends Controller
{

  public function gerarCarga(){

  $data = [
    "cd"=>[
      "address"=> "Avenida Visconde De Ibituruna, 399, Barreiro, Belo Horizonte",
      "lat" => "-19.975875",
      "lng" => "-44.015610"
  ],
    "vehicle"=> [
        "qtde" => 2,
        "weight"=> 100000000,
        "cubage" => 1000000000,
        "deliveries" => 20,
        "km" => 1000000,
        "time" => 100000000,
        "vehiclesRequired" => 0
      ],
      "deliveries"=> [
       "id"=> 101,
       "address"=> "Rua Paraiba, 330, Funcionarios, Belo Horizonte",
       "coords"=> [
         "lat"=> -19.928990,
         "lng"=> -43.931740
       ],
       "dimens"=> [
          "weight"=> 100,
          "cubage"=> 1000
        ]
     ]
];

$aa = [
  'data' =>[]
];

$client = new \GuzzleHttp\Client();
$response = $client->POST('http://localhost:3000/roteirizador', [
    $aa
]);

//dd($response);

 }
}
