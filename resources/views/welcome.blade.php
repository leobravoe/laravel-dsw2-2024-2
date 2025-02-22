@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Sistema Delivery em Laravel</h2>
        <a href="{{ route('produto.index') }}" class="btn btn-primary">Produto</a>
        <a href="{{ route('tipoproduto.index') }}" class="btn btn-primary">TipoProduto</a>
        <a href="{{ route('endereco.index') }}" class="btn btn-primary">Endereço</a>
    </div>
@endsection
