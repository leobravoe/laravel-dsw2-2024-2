@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('tipoproduto.update', $tipoProduto->id) }}">
            @csrf
            @method('put')
            <div class="my-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input id="id-input-id" type="text" class="form-control" aria-describedby="id-help-id" value="{{ $tipoProduto->id }}" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
            </div>
            <div class="my-3">
                <label for="id-input-descricao" class="form-label">Descrição</label>
                <input id="id-input-descricao" type="text" class="form-control" placeholder="Digite a descrição" name="descricao" value="{{ $tipoProduto->descricao }}" required>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('tipoproduto.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
