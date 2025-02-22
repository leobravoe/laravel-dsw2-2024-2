<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProdutoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $message  = Session::get("message");
            $produtos = DB::select("SELECT Produtos.*,
                                       Tipo_Produtos.descricao
                                FROM Produtos
                                JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id");
            return view("produto.index")->with("produtos", $produtos)->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return view("produto.index")->with("produtos", [])->with("message", $message);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
            return view("produto.create")->with("tipoProdutos", $tipoProdutos);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("produto.index")->with("message", $message);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $produto                   = new Produto();
            $produto->nome             = $request->nome;
            $produto->preco            = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes     = $request->ingredientes;
            $produto->urlImage         = "/img-default/default.png"; // url de imagem padrão
            $produto->save();
            $produto->updateImage($request, "imagem");
            DB::commit(); // Confirma a transação
            $message = ["O produto ($produto->nome) foi salvo com sucesso", "success"];
            return redirect()->route("produto.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("produto.index")->with("message", $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $produtos = DB::select("SELECT Produtos.*,
                                            Tipo_Produtos.descricao
                                    FROM Produtos
                                    JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                    WHERE Produtos.id = ?", [$id]);
            if (count($produtos) == 1) {
                return view("produto.show")->with("produto", $produtos[0]);
            }
            $message = ["Produto $id não encontrado", "warning"];
            return redirect()->route("produto.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("produto.index")->with("message", $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $produto = Produto::find($id);
            if (isset($produto)) {
                $tipoProdutos = TipoProduto::all();
                return view("produto.edit")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
            }
            $message = ["Produto $id não encontrado", "warning"];
            return redirect()->route("produto.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("produto.index")->with("message", $message);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $produto = Produto::find($id);
            if (isset($produto)) {
                $produto->nome             = $request->nome;
                $produto->preco            = $request->preco;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->ingredientes     = $request->ingredientes;
                $produto->update();
                $produto->updateImage($request, "imagem");
                DB::commit(); // Confirma a transação
                $message = ["Produto $id atualizado com sucesso", "success"];
                return redirect()->route("produto.index")->with("message", $message);
            }
            DB::commit(); // Confirma a transação
            $message = ["Produto $id não encontrado", "warning"];
            return redirect()->route("produto.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("produto.index")->with("message", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $produto = Produto::find($id);
            if (isset($produto)) {
                $produto->delete();
                $produto->removeImage();
                DB::commit(); // Confirma a transação
                $message = ["Produto $id removido com sucesso", "success"];
                return redirect()->route("produto.index")->with("message", $message);
            }
            DB::commit(); // Confirma a transação
            $message = ["Produto $id não encontrado", "warning"];
            return redirect()->route("produto.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("produto.index")->with("message", $message);
        }
    }
}
