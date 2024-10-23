<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <form method="post" action="{{ route('produto.update', $produto->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put');
            <div class="my-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id"
                    value="{{ $produto->id }}" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
            </div>
            <div class="my-3">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="id-input-nome" placeholder="Digite o nome" name="nome"
                    value="{{ $produto->nome }}" required>
            </div>
            <div class="my-3">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input type="text" class="form-control" id="id-input-preco" placeholder="Digite o preço"
                    name="preco" value="{{ $produto->preco }}" required>
            </div>
            <div class="my-3">
                <label for="id-select-Tipo_Produtos_id" class="form-label">Tipo</label>
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
                <label for="id-input-ingredientes" class="form-label">ingredientes</label>
                <input type="text" class="form-control" id="id-input-ingredientes"
                    placeholder="Digite os ingredientes" name="ingredientes" value="{{ $produto->ingredientes }}"
                    required>
            </div>
            <div class="my-3">
                <label for="id-input-imagem" class="form-label">Imagem</label>
                {{-- <input type="text" class="form-control" id="id-input-urlImage" placeholder="Digite o urlImage"
                    name="urlImage" required> --}}
                <input type="file" class="form-control" id="id-input-imagem" name="imagem">
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('produto.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
