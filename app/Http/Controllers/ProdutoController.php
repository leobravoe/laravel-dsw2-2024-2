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
        $produto = new Produto();
        // MODEL(Tabela) = REQUEST(Dados nomeados do formulário)
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
        $produto->ingredientes = $request->ingredientes;

        // Verifica se uma imagem foi enviada e a armazena
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem'); // pega a imagem enviada e coloca na variável $imagem
            // Usa explode para dividir a string de microtime em duas partes
            list($segundos, $microsegundos) = explode(".", microtime(true)); // retorna uma string no formato "segundos.microsegundos" desde a era Unix (1 de janeiro de 1970)
            // Gera o nome da imagem no formato: nome-YYYY-MM-DD-SS-MS.ext
            $nomeImagem = $produto->nome . date("-Y-m-d-") . $segundos . "-" . $microsegundos . "." . $imagem->getClientOriginalExtension();
            $caminhoImagem = public_path("/img/produto"); // caminho da pasta public
            $imagem->move($caminhoImagem, $nomeImagem); // coloca a imagem na pasta
            $produto->urlImage = "/img/produto/$nomeImagem"; // Salva o caminho da imagem no banco de dados
        } else {
            $produto->urlImage = "/img/default.png"; // url de imagem padrão
        }

        $produto->save();
        return redirect()->route("produto.index");
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
        // Utiliza o model para fazer uma busca em uma chave primária da tabela
        // O objeto retornado é do tipo Model
        $produto = Produto::find($id);
        $tipoProdutos = TipoProduto::all();

        // Faço um consulta com DB::select e pego o primeiro elemento do array
        //$produto = DB::select("SELECT * FROM Produtos WHERE id = 1")[0];
        //dd($produto);

        // Mando carregar a view edit de Produto com a variável $produto dentro dela
        return view("produto.edit")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
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
