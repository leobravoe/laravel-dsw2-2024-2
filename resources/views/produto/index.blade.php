<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
    <div class="container">
        {{-- A mensagem que será mandada para a View --}}
        @php
            $message = ['Messagem a ser exibida', 'danger'];
        @endphp
        
        {{-- Verifica se dentro da View existe a variável $message --}}
        @if (isset($message))
            <div class="alert alert-{{ $message[1] }} alert-dismissible fade show" role="alert">
                <span>{{ $message[0] }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('produto.create') }}" class="btn btn-primary">Criar Produto</a>
        <a href="/" class="btn btn-primary">Voltar</a>
        <table class="table-hover table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <th scope="row">{{ $produto->id }}</th>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>
                            <a href="{{ route('produto.show', $produto->id) }}" class="btn btn-primary">Mostrar</a>
                            <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-secondary">Editar</a>
                            <a value="/produto/{{ $produto->id }}" href="#" class="btn btn-danger btnRemover" data-bs-toggle="modal" data-bs-target="#exampleModal">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="exampleModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="exampleModalLabel" class="modal-title fs-5">Remoção de Recurso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente remover este recurso?
                </div>
                <div class="modal-footer">
                    <form id="id-form-modal-botao-remover" method="post" action="">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let arrayBotaoRemover = document.querySelectorAll(".btnRemover");
        let formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
        console.log(arrayBotaoRemover);
        console.log(formModalBotaoRemover);
        arrayBotaoRemover.forEach(element => {
            element.addEventListener("click", configuraBotaoRemoverModal);
        });

        function configuraBotaoRemoverModal() {
            //alert(this.getAttribute("value"));
            formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
        }
    </script>

</body>

</html>
