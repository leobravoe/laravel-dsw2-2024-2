<?php

use Illuminate\Support\Facades\Route;

use \App\Models\TipoProduto;
use \App\Models\Produto;
use Illuminate\Support\Facades\DB;

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

// Rotas de TipoProduto
// index
Route::get("/tipoproduto", "App\Http\Controllers\TipoProdutoController@index");
// create
Route::get("/tipoproduto/create", "App\Http\Controllers\TipoProdutoController@create");
// store
Route::post("/tipoproduto", "App\Http\Controllers\TipoProdutoController@store");

