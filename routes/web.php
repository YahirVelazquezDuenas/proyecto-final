<?php

use App\Http\Controllers\AceiteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\WelcomeController;
use App\Models\Aceite;
use App\Models\Cliente;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/login', function () {
    return view('login');
});
Route::post('/aceite', 'AceiteController@store')->name('createAceite');
Route::post('/cliente', 'ClienteController@store')->name('createCliente');
Route::post('/compras', 'ComprasController@store')->name('createCompras');
Route::resource('aceite', AceiteController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('compras', ComprasController::class);
Route::get('/aceite/{id}', 'AceiteController@show')->name('showAceite');
Route::get('/cliente/{id}', 'ClienteController@show')->name('showCliente');
Route::get('/compras/{id}', 'ComprasController@show')->name('showCompras');
Route::get('/aceite/{id}/edit', 'AceiteController@edit')->name('editAceite');
Route::put('/aceite/{id}', 'AceiteController@update')->name('updateAceite');
Route::delete('/aceite/{id}', 'AceiteController@destroy')->name('destroyAceite');
Route::get('/cliente/{id}/edit', 'ClienteController@edit')->name('editCliente');
Route::put('/cliente/{id}', 'ClienteController@update')->name('updateCliente');
Route::delete('/cliente/{id}', 'ClienteController@destroy')->name('destroyCliente');
Route::get('/compras/{id}/edit', 'ComprasController@edit')->name('editCompras');
Route::put('/compras/{id}', 'ComprasController@update')->name('updateCompras');
Route::delete('/compras/{id}', 'ComprasController@destroy')->name('destroyCompras');


