<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vendor.adminlte.auth.login');
});

Route::get('sendMailPedido', function() {
    //return new \App\Mail\newEmailPedido();
    
});
Route::get('sendmailpedidocreate', function() {
    //return new \App\Mail\newEmailPedidoCreate();
    
});
Auth::routes();

Route::resource('home','HomeController');

Route::resource('users', 'UsersController'); 
Route::resource('produto', 'ProdutoController'); 
Route::resource('cliente', 'ClienteController'); 
Route::resource('pedido', 'PedidoController'); 