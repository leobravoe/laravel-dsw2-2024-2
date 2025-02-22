@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Verifica se dentro da View existe a variável $message --}}
        @if (isset($message))
            <div class="alert alert-{{ $message[1] }} alert-dismissible fade show" role="alert">
                <span>{{ $message[0] }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('tipoproduto.create') }}" class="btn btn-primary">Criar TipoProduto</a>
        <a href="/" class="btn btn-primary">Voltar</a>
        <table class="table-hover table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoProdutos as $tipoProduto)
                    <tr>
                        <th scope="row">{{ $tipoProduto->id }}</th>
                        <td>{{ $tipoProduto->descricao }}</td>
                        <td>
                            <a href="{{ route('tipoproduto.show', $tipoProduto->id) }}" class="btn btn-primary">Mostrar</a>
                            <a href="{{ route('tipoproduto.edit', $tipoProduto->id) }}" class="btn btn-secondary">Editar</a>
                            <a value="/tipoproduto/{{ $tipoProduto->id }}" href="#" class="btn btn-danger btnRemover" data-bs-toggle="modal" data-bs-target="#exampleModal">Remover</a>
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
@endsection
