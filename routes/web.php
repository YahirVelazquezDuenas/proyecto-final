<?php

use App\Http\Controllers\AceiteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprasController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/compras', 'ComprasController@store')->name('createCompras');
Route::resource('aceite', AceiteController::class);
Route::resource('compras', ComprasController::class);
