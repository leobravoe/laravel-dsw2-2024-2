<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Edit de Produto</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <form action="{{ route('produto.update', $produto->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <div class="my-3">
                <label class="form-label" for="id-input-id">ID</label>
                <input id="id-input-id" aria-describedby="id-help-id" class="form-control" disabled type="text" value="{{ $produto->id }}">
                <div id="id-help-id" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-nome">Nome</label>
                <input id="id-input-nome" class="form-control" name="nome" placeholder="Digite o nome" required type="text" value="{{ $produto->nome }}">
            </div>
            <div class="my-3">
                <label class="form-label" for="id-input-preco">Preço</label>
                <input id="id-input-preco" class="form-control" name="preco" placeholder="Digite o preço" required type="text" value="{{ $produto->preco }}">
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
</body>

</html>
