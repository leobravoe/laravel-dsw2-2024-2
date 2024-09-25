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

Route::get('/teste', function () {
    echo "<html>";
    echo "<h1>teste</h1>";
    echo "</html>";
});

Route::get('ola/sejabemvindo', function () {
    echo "Olá! Seja bem vindo.";
});

Route::get('ola/{nome}', function ($nome) {
    echo "Olá! Seja bem vindo $nome.";
});

Route::get('ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    echo "Olá! Seja bem vindo $nome $sobrenome.";
});

Route::get('opcional/{nome?}', function ($nome = null) {
    if (isset($nome)) {
        echo "Olá! Seja bem vindo $nome.";
    } else {
        echo "Olá! Seja bem vindo anônimo.";
    }
});

Route::get('rotacomregra/{nome}/{n}', function ($nome, $n) {
    for ($i=0; $i < $n; $i++) { 
        echo "Olá! Seja bem vindo $nome. <br>";
    }
    echo "i = $i <br>";
    echo "n = $n <br>";
});

Route::prefix("/app")->group( function(){
    Route::get('/', function () {
        echo "Página no app";
    });
    Route::get('/user', function () {
        echo "Página do usuário";
    });
    Route::get('/admin', function () {
        echo "Página do administrador";
    });
});

Route::get("tipoproduto/add/{descricao}", function($descricao){
    // uses
    // use \App\Models\TipoProduto;
    // use Illuminate\Support\Facades\DB;
    $tipoProduto = new TipoProduto();
    $tipoProduto->descricao = $descricao;
    $tipoProduto->save();
    $result = DB::select("SELECT * FROM Tipo_Produtos"); // sempre será um array
    //dd($result);
    return $result;
});

Route::get("produto/add/{nome}/{preco}/{Tipo_Produtos_id}/{ingredientes}/{urlImage}", function($nome, $preco, $Tipo_Produtos_id, $ingredientes, $urlImage){
    $produto = new Produto();
    $produto->nome = $nome;
    $produto->preco = $preco;
    $produto->Tipo_Produtos_id = $Tipo_Produtos_id;
    $produto->ingredientes = $ingredientes;
    $produto->urlImage = $urlImage;
    $produto->save();
    $result = DB::select("SELECT * FROM Produtos");
    return $result;
});
