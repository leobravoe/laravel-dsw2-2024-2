@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('produto.update', $produto->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <div class="my-3">
                <label class="form-label" for="id-input-id">ID</label>
                <input id="id-input-id" aria-describedby="id-help-id" class="form-control" disabled type="text" value="{{ $produto->id }}">
                <div id="id-help-id" class="form-text">Não possível alterar o ID de um dado.</div>
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-nome">Nome</label>
                <input id="id-input-nome" class="form-control" name="nome" placeholder="Digite o nome" required type="text" value="{{ $produto->nome }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-preco">Preço</label>
                <input id="id-input-preco" class="form-control" name="preco" placeholder="Digite o preço" required type="number" value="{{ $produto->preco }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-select-Tipo_Produtos_id">Tipo</label>
                <select id="id-select-Tipo_Produtos_id" class="form-select" name="Tipo_Produtos_id">
                    @foreach ($tipoProdutos as $tipoProduto)
                        {{-- Quando eu for imprimir um option, verifico se: --}}
                        {{-- $produto->Tipo_Produtos_id que estou editando é igual ao elemento no select --}}
                        {{-- Então ele deve ser marcado como selecionado --}}
                        @if ($produto->Tipo_Produtos_id == $tipoProduto->id)
                            <option selected value="{{ $tipoProduto->id }}">{{ $tipoProduto->descricao }}</option>
                        @else
                            <option value="{{ $tipoProduto->id }}">{{ $tipoProduto->descricao }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-ingredientes">ingredientes</label>
                <input id="id-input-ingredientes" class="form-control" name="ingredientes" placeholder="Digite os ingredientes" required type="text" value="{{ $produto->ingredientes }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-imagem">Imagem</label>
                <input id="id-input-imagem" class="form-control" name="imagem" type="file">
            </div>
            <div class="my-3">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <a class="btn btn-primary" href="{{ route('produto.index') }}">Voltar</a>
            </div>
        </form>
    </div>
@endsection
