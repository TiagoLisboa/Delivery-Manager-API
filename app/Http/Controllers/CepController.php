<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
  /**
   * Display the specified resource.
   *
   * @param  \App\Address  $address
   * @return \Illuminate\Http\Response
   */
  public function show($cep) {

    $cep_search = Http::get('https://brasilapi.com.br/api/cep/v1/' . $cep)->json();
    $cep_search['address'] = $cep_search['street'];
    unset($cep_search['street']);

    return response()->json($cep_search);

  }
}
