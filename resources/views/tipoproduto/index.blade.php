<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        <h1>View Index de TipoProduto</h1>
        @dump($tipoProdutos)
        <a href="#" class="btn btn-primary">Criar TipoProduto</a>
        <a href="#" class="btn btn-primary">Voltar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Pizza</td>
                    <td>
                        <a href="#" class="btn btn-primary">Mostrar</a>
                        <a href="#" class="btn btn-secondary">Editar</a>
                        <a href="#" class="btn btn-danger">Remover</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Suco</td>
                    <td>
                        <a href="#" class="btn btn-primary">Mostrar</a>
                        <a href="#" class="btn btn-secondary">Editar</a>
                        <a href="#" class="btn btn-danger">Remover</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Cerveja</td>
                    <td>
                        <a href="#" class="btn btn-primary">Mostrar</a>
                        <a href="#" class="btn btn-secondary">Editar</a>
                        <a href="#" class="btn btn-danger">Remover</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
