<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show de Endereço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
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
</body>

</html>
