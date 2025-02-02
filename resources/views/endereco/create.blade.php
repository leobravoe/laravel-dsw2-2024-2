<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create de Endereço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <form method="post" action="{{ route('endereco.store') }}">
            @csrf
            <div class="my-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input id="id-input-id" type="text" class="form-control" aria-describedby="id-help-id" value="#" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informar o ID para cadastrar um novo dado.</div>
            </div>
            <div class="my-3">
                <label for="id-input-bairro" class="form-label">Bairro</label>
                <input id="id-input-bairro" type="text" class="form-control" placeholder="Digite o bairro" name="bairro" required>
            </div>
            <div class="my-3">
                <label for="id-input-logradouro" class="form-label">Logradouro</label>
                <input id="id-input-logradouro" type="text" class="form-control" placeholder="Digite o logradouro" name="logradouro" required>
            </div>
            <div class="my-3">
                <label for="id-input-numero" class="form-label">Número</label>
                <input id="id-input-numero" type="text" class="form-control" placeholder="Digite o numero" name="numero" required>
            </div>
            <div class="my-3">
                <label for="id-input-complemento" class="form-label">Complemento</label>
                <input id="id-input-complemento" type="text" class="form-control" placeholder="Digite o complemento" name="complemento">
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('endereco.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
