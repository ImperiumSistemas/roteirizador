<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Veiculos extends Model
{
    //public $timestamps = false;

  //  use SoftDeletes;
    protected $fillable = [
        'id','marca','km_rodado','ano','modelo','capacida_peso','capacidade_cubagem','chassi','renavan', 'TIPO_VEICULOS_id'
    ];

  /* public function teste(){
    $motoristas =  DB::table('motoristas');
    // ->join('filiais_motoristas', 'motoristas.id', '=', 'filiais_motoristas.motorista_id')
    // ->select('motoristas.', 'filiais_motoristas.')
    // ->get();
    dd();

    return $motoristas;
  }*/


}
