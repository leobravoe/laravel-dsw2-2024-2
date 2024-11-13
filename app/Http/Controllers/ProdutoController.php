<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use App\Models\TipoProduto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = DB::select("SELECT Produtos.*, 
                                       Tipo_Produtos.descricao 
                                FROM Produtos
                                JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id");
        //dd($produtos);
        return view("produto.index")->with("produtos", $produtos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retorna um array
        $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
        //dd($tipoProdutos);
        // Mando para a view
        return view("produto.create")->with("tipoProdutos", $tipoProdutos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction(); // Inicia a transação
        try {
            $produto = new Produto();
            // MODEL(Tabela) = REQUEST(Dados nomeados do formulário)
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes = $request->ingredientes;
            $produto->urlImage = "/img-default/default.png"; // url de imagem padrão
            $produto->save();
            $produto->updateImage($request, "imagem");
            DB::commit(); // Confirma a transação
            return redirect()->route("produto.index");
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            dd($th);
            return redirect()->route("produto.index");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd($id);
        // DB select sempre retorna um array
        // Essa consulta em específico sempre 
        // retorna um array com um objeto ou um array vazio
        $produtos = DB::select("SELECT Produtos.*,
                                       Tipo_Produtos.descricao
                                FROM Produtos 
                                JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                WHERE Produtos.id = ?", [$id]);
        //dd($produtos);
        //dd(count($produtos));
        if (count($produtos) == 1) {
            // Manda carregar a view produto.show criando nela
            // a variável $produto com o conteúdo do primeiro índice do array $produtos
            // Mando um objeto, pois o acesso aos dados não precisa de foreach
            return view("produto.show")->with("produto", $produtos[0]);
        } else {
            return "O produto de id = $id não foi encontrado";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        if (isset($produto)) {
            $tipoProdutos = TipoProduto::all();
            return view("produto.edit")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
        }
        return "O produto $id não foi encontrado";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction(); // Inicia a transação
        try {
            $produto = Produto::find($id);
            if (isset($produto)) {
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->ingredientes = $request->ingredientes;
                $produto->update();
                $produto->updateImage($request, "imagem");
            }
            DB::commit(); // Confirma a transação
            return redirect()->route("produto.index");
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            dd($th);
            return redirect()->route("produto.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction(); // Inicia a transação
        try {
            $produto = Produto::find($id);
            if (isset($produto)) {
                $produto->delete();
                $produto->removeImage();
            }
            DB::commit(); // Confirma a transação
            return redirect()->route("produto.index");
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            dd($th);
            return redirect()->route("produto.index");
        }
    }
}
