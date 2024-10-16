<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <div class="my-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id"
                value="{{ $produto->id }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="id-input-nome" value="{{ $produto->nome }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-preco" class="form-label">Preço</label>
            <input type="text" class="form-control" id="id-input-preco" value="{{ $produto->preco }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-descricao" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="id-input-descricao" value="{{ $produto->descricao }}"
                disabled>
        </div>
        <div class="my-3">
            <label for="id-input-ingredientes" class="form-label">ingredientes</label>
            <input type="text" class="form-control" id="id-input-ingredientes" value="{{ $produto->ingredientes }}"
                disabled>
        </div>
        <div class="my-3">
            <label for="id-input-imagem" class="form-label">Imagem</label>
            <input type="text" class="form-control" id="id-input-imagem" value="{{ $produto->urlImage }}" disabled>
            <div class="text-center">
                <img src="{{ $produto->urlImage }}">
            </div>
        </div>
        <div class="my-3">
            <a href="{{ route('produto.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>

</html>
