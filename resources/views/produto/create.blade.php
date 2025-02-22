@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('produto.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input id="id-input-id" type="text" class="form-control" aria-describedby="id-help-id" value="#" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
            </div>
            <div class="my-3">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input id="id-input-nome" type="text" class="form-control" placeholder="Digite o nome" name="nome" required>
            </div>
            <div class="my-3">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input id="id-input-preco" type="text" class="form-control" placeholder="Digite o preço" name="preco" required>
            </div>
            <div class="my-3">
                <label for="id-select-Tipo_Produtos_id" class="form-label">Tipo</label>
                <select id="id-select-Tipo_Produtos_id" class="form-select" name="Tipo_Produtos_id">
                    @foreach ($tipoProdutos as $tipoProduto)
                        <option value="{{ $tipoProduto->id }}">{{ $tipoProduto->descricao }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-3">
                <label for="id-input-ingredientes" class="form-label">ingredientes</label>
                <input id="id-input-ingredientes" type="text" class="form-control" placeholder="Digite os ingredientes" name="ingredientes" required>
            </div>
            <div class="my-3">
                <label for="id-input-imagem" class="form-label">Imagem</label>
                <input id="id-input-imagem" type="file" class="form-control" name="imagem">
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('produto.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
