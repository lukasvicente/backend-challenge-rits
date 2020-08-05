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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('cliente/pedido/list', 'Api\\ClienteController@index');
Route::post('cliente/register', 'Api\\ClienteController@store');

Route::get('pedido', 'Api\\PedidoController@index');
Route::get('cliente/pedido/detail/{id}', 'Api\\PedidoController@show');
Route::delete('cliente/pedido/delete/{id}', 'Api\\PedidoController@destroy');
Route::post('cliente/pedido/create', 'Api\\PedidoController@store');