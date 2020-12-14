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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'ProductosController@index');
Route::resource('productos', 'ProductosController');
Route::resource('clientes', 'ClientesController');
Route::resource('pagos', 'PagosController');
Route::get('nuevoProd/{id}', 'ClientesController@nuevoProd')->name('clientes.nuevoProd');
Route::get('registraPago/{id}', 'ClientesController@registraPago')->name('clientes.registraPago');
Route::post ('restaDeuda/{id}', 'ClientesController@restaDeuda')->name('clientes.restaDeuda');
Route::post ('updateProducto/{id}', 'ClientesController@updateProducto')->name('clientes.updateProducto');