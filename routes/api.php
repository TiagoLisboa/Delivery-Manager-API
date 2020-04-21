<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */



Route::middleware('return-json')->group(function () {
  Route::group([
   'middleware' => 'api',
   'prefix' => 'auth'
  ], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
  });

  Route::middleware('auth:api')->get('/user', function (Request $request) {
      return $request->user();
  });

  Route::apiResource('deliveries', 'DeliveryController');
  Route::apiResource('addresses', 'AddressController');

  Route::get('cep/{cep}', 'CepController@show');


  Route::fallback(function(){
      return response()->json([
          'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
  });
});


