<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TipoProduto;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Vai no banco de dados e busca todos os dados da tabela Tipo_Produtos
        // Esses dados são salvos na variável $tipoProdutos
        // $tipoProdutos = TipoProduto::all();
        $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
        // Mando carregar a view index de TipoProduto com a variável $tipoProdutos
        // No comando with o primeiro argumento é o nome da variável que será criada
        // dentro da view. O segundo é os dados que ela irá conter.
        return view("tipoproduto.index")->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tipoproduto.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // use App\Models\TipoProduto;
        $tipoProduto = new TipoProduto();
        $tipoProduto->descricao = $request->descricao;
        $tipoProduto->save();
        return redirect("/tipoproduto");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
