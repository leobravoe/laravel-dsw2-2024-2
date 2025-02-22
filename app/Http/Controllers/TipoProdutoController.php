<?php
namespace App\Http\Controllers;

use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TipoProdutoController extends Controller
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
            $message      = Session::get("message");
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
        try {
            return view("tipoproduto.create");
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $tipoProduto            = new TipoProduto();
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();
            DB::commit(); // Confirma a transação
            $message = ["TipoProduto ($tipoProduto->descricao) salvo com sucesso", "success"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $tipoProdutos = DB::select("SELECT *
                                        FROM Tipo_Produtos
                                        WHERE Tipo_Produtos.id = ?", [$id]);
            if (count($tipoProdutos) == 1) {
                return view("tipoproduto.show")->with("tipoProduto", $tipoProdutos[0]);
            }
            $message = ["TipoProduto ($id) não foi encontrado", "warning"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            if (isset($tipoProduto)) {
                return view("tipoproduto.edit")->with("tipoProduto", $tipoProduto);
            }
            $message = ["TipoProduto ($id) não foi encontrado", "warning"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $tipoProduto = TipoProduto::find($id);
            if (isset($tipoProduto)) {
                $tipoProduto->descricao = $request->descricao;
                $tipoProduto->update();
                DB::commit(); // Confirma a transação
                $message = ["TipoProduto ($tipoProduto->descricao) atualizado com sucesso", "success"];
                return redirect()->route("tipoproduto.index")->with("message", $message);
            }
            DB::commit(); // Confirma a transação
            $message = ["TipoProduto ($id) não foi encontrado", "warning"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $tipoProduto = TipoProduto::find($id);
            if (isset($tipoProduto)) {
                $tipoProduto->delete();
                DB::commit(); // Confirma a transação
                $message = ["TipoProduto ($tipoProduto->descricao) removido com sucesso", "success"];
                return redirect()->route("tipoproduto.index")->with("message", $message);
            }
            DB::commit(); // Confirma a transação
            $message = ["TipoProduto ($id) não foi encontrado", "warning"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("tipoproduto.index")->with("message", $message);
        }
    }
}
