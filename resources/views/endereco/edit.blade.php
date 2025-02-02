<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Edit de Endereço</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
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
</body>

</html>
