<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\TipoProduto;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $message = Session::get("message");
            $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
            return view("tipoproduto.index")->with("tipoProdutos", $tipoProdutos)->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return view("tipoproduto.index")->with("tipoProdutos", [])->with("message", $message);
        }
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
        try {
            DB::beginTransaction(); // Inicia a transação
            $tipoProduto = new TipoProduto();
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();
            DB::commit(); // Confirma a transação
            return redirect()->route("tipoproduto.index");
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            dd($th);
            return redirect()->route("tipoproduto.index");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipoProdutos = DB::select("SELECT *
                                FROM Tipo_Produtos
                                WHERE Tipo_Produtos.id = ?", [$id]);
        if (count($tipoProdutos) == 1) {
            return view("tipoproduto.show")->with("tipoProduto", $tipoProdutos[0]);
        } else {
            return "O tipo produto de id = $id não foi encontrado";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipoProduto = TipoProduto::find($id);
        if (isset($tipoProduto)) {
            return view("tipoproduto.edit")->with("tipoProduto", $tipoProduto);
        }
        return "O tipo produto $id não foi encontrado";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction(); // Inicia a transação
        try {
            $tipoProduto = TipoProduto::find($id);
            if (isset($tipoProduto)) {
                $tipoProduto->descricao = $request->descricao;
                $tipoProduto->update();
            }
            DB::commit(); // Confirma a transação
            return redirect()->route("tipoproduto.index");
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            dd($th);
            return redirect()->route("tipoproduto.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
    }
}
