@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input id="id-input-id" type="text" class="form-control" value="{{ $produto->id }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-nome" class="form-label">Nome</label>
            <input id="id-input-nome" type="text" class="form-control" value="{{ $produto->nome }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-preco" class="form-label">Preço</label>
            <input id="id-input-preco" type="text" class="form-control" value="{{ $produto->preco }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-descricao" class="form-label">Tipo</label>
            <input id="id-input-descricao" type="text" class="form-control" value="{{ $produto->descricao }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-ingredientes" class="form-label">ingredientes</label>
            <input id="id-input-ingredientes" type="text" class="form-control" value="{{ $produto->ingredientes }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-imagem" class="form-label">Imagem</label>
            <input id="id-input-imagem" type="text" class="form-control" value="{{ $produto->urlImage }}" disabled>
            <div class="text-center">
                <img class="w-50" src="{{ $produto->urlImage }}">
            </div>
        </div>
        <div class="my-3">
            <label for="id-input-updated_at" class="form-label">Data de atualização</label>
            <input id="id-input-updated_at" type="text" class="form-control" value="{{ $produto->updated_at }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-created_at" class="form-label">Data de criação</label>
            <input id="id-input-created_at" type="text" class="form-control" value="{{ $produto->created_at }}" disabled>
        </div>
        <div class="my-3">
            <a href="{{ route('produto.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@endsection
