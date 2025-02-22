@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-3">
            <label class="form-label" for="id-input-id">ID</label>
            <input id="id-input-id" aria-describedby="id-help-id" class="form-control" disabled type="text" value="{{ $endereco->id }}">
            <div id="id-help-id" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
        </div>
        <div class="my-3">
            <label class="form-label" for="id-input-bairro">Bairro</label>
            <input id="id-input-bairro" class="form-control" name="bairro" placeholder="Digite o bairro" disabled type="text" value="{{ $endereco->bairro }}">
        </div>
        <div class="my-3">
            <label class="form-label" for="id-input-logradouro">Logradouro</label>
            <input id="id-input-logradouro" class="form-control" name="logradouro" placeholder="Digite o logradouro" disabled type="text" value="{{ $endereco->logradouro }}">
        </div>
        <div class="my-3">
            <label class="form-label" for="id-input-numero">Número</label>
            <input id="id-input-numero" class="form-control" name="numero" placeholder="Digite o numero" disabled type="text" value="{{ $endereco->numero }}">
        </div>
        <div class="my-3">
            <label class="form-label" for="id-input-complemento">Complemento</label>
            <input id="id-input-complemento" class="form-control" name="complemento" placeholder="Digite o complemento" disabled type="text" value="{{ $endereco->complemento }}">
        </div>
        <div class="my-3">
            <label class="form-label" for="id-input-updated_at">Data de Atualização</label>
            <input id="id-input-updated_at" class="form-control" name="updated_at" placeholder="Digite o updated_at" disabled type="text" value="{{ $endereco->updated_at }}">
        </div>
        <div class="my-3">
            <label class="form-label" for="id-input-created_at">Data de criação</label>
            <input id="id-input-created_at" class="form-control" name="created_at" placeholder="Digite o created_at" disabled type="text" value="{{ $endereco->created_at }}">
        </div>
        <div class="my-3">
            <a href="{{ route('endereco.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@endsection
