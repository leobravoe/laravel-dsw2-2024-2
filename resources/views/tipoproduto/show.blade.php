<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show de TipoProduto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <div class="my-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input id="id-input-id" type="text" class="form-control" value="{{ $tipoProduto->id }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-descricao" class="form-label">Descrição</label>
            <input id="id-input-descricao" type="text" class="form-control" value="{{ $tipoProduto->descricao }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-descricao" class="form-label">Data de Atualização</label>
            <input id="id-input-descricao" type="text" class="form-control" value="{{ $tipoProduto->updated_at }}" disabled>
        </div>
        <div class="my-3">
            <label for="id-input-descricao" class="form-label">Data de criação</label>
            <input id="id-input-descricao" type="text" class="form-control" value="{{ $tipoProduto->created_at }}" disabled>
        </div>
        <div class="my-3">
            <a href="{{ route('tipoproduto.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</body>

</html>
