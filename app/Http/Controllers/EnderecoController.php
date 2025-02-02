<?php
namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $message   = Session::get("message");
            $enderecos = DB::select('SELECT * FROM Enderecos');
            return view("endereco.index")->with("enderecos", $enderecos)->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return view("endereco.index")->with("enderecos", [])->with("message", $message);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view("endereco.create");
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("endereco.index")->with("message", $message);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $endereco              = new Endereco();
            $endereco->Users_id    = 1;
            $endereco->bairro      = $request->bairro;
            $endereco->logradouro  = $request->logradouro;
            $endereco->numero      = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->save();
            DB::commit(); // Confirma a transação
            $message = ["O endereco ($endereco->logradouro) foi salvo com sucesso", "success"];
            return redirect()->route("endereco.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("endereco.index")->with("message", $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $endereco = Endereco::find($id);
            if (isset($endereco)) {
                return view("endereco.show")->with("endereco", $endereco);
            }
            $message = ["Endereço $id não encontrado", "warning"];
            return redirect()->route("endereco.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("endereco.index")->with("message", $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $endereco = Endereco::find($id);
            if (isset($endereco)) {
                return view("endereco.edit")->with("endereco", $endereco);
            }
            $message = ["Endereço $id não encontrado", "warning"];
            return redirect()->route("endereco.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("endereco.index")->with("message", $message);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $endereco = Endereco::find($id);
            if (isset($endereco)) {
                $endereco->Users_id    = 1;
                $endereco->bairro      = $request->bairro;
                $endereco->logradouro  = $request->logradouro;
                $endereco->numero      = $request->numero;
                $endereco->complemento = $request->complemento;
                $endereco->update();
                DB::commit(); // Confirma a transação
                $message = ["Endereço $id atualizado com sucesso", "success"];
                return redirect()->route("endereco.index")->with("message", $message);
            }
            DB::commit(); // Confirma a transação
            $message = ["Endereço $id não encontrado", "warning"];
            return redirect()->route("endereco.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("endereco.index")->with("message", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction(); // Inicia a transação
            $endereco = Endereco::find($id);
            if (isset($endereco)) {
                $endereco->delete();
                DB::commit(); // Confirma a transação
                $message = ["Endereço $id removido com sucesso", "success"];
                return redirect()->route("endereco.index")->with("message", $message);
            }
            DB::commit(); // Confirma a transação
            $message = ["Endereço $id não encontrado", "warning"];
            return redirect()->route("endereco.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("endereco.index")->with("message", $message);
        }
    }
}
