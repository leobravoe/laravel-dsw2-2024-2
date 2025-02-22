@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('endereco.update', $endereco->id) }}" method="post">
            @csrf
            @method('put')
            <div class="my-3">
                <label class="form-label" for="id-input-id">ID</label>
                <input id="id-input-id" aria-describedby="id-help-id" class="form-control" disabled type="text" value="{{ $endereco->id }}">
                <div id="id-help-id" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-bairro">Bairro</label>
                <input id="id-input-bairro" class="form-control" name="bairro" placeholder="Digite o bairro" required type="text" value="{{ $endereco->bairro }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-logradouro">Logradouro</label>
                <input id="id-input-logradouro" class="form-control" name="logradouro" placeholder="Digite o logradouro" required type="text" value="{{ $endereco->logradouro }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-numero">Número</label>
                <input id="id-input-numero" class="form-control" name="numero" placeholder="Digite o numero" required type="text" value="{{ $endereco->numero }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-complemento">Complemento</label>
                <input id="id-input-complemento" class="form-control" name="complemento" placeholder="Digite o complemento" type="text" value="{{ $endereco->complemento }}">
            </div>
            <div class="my-3">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <a class="btn btn-primary" href="{{ route('endereco.index') }}">Voltar</a>
            </div>
        </form>
    </div>
@endsection
