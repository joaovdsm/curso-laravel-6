@extends('admin.template.app')

@section('title', 'Todos')

{{--
    @component('admin.components.card')

        @slot('title')
            <h3>Titulo do card<h3>
        @endslot

        Conteúdo

    @endcomponent

    <hr>

    @include('admin.includes.alert', ['content' => 'este é o conteúdo do alert'])

    <hr>
--}}

@section('content')

    <div class="d-flex align-items-start justify-content-between">
        <a class="btn mb-2 btn-primary" href="{{ route('produtos.create') }}"> Cadastrar novo produto </a>

        <form action="{{ route('produtos.search') }}" method="post" class="form form-inline">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="pesquisar" value=" {{ $filters['pesquisar'] ?? null }} " class="form-control">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width=100>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width=100>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>
                        @if ($produto->image)
                            <img src="{{ url("storage/{$produto->image}") }}" alt="{{ $produto->nome }}" style="max-width: 100px;">
                        @else

                        @endif
                    </td>
                    <td> {{ $produto->nome }} </td>
                    <td> {{ 'R$' . $produto->preco }} </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <a class="btn btn-primary" href="{{ route('produtos.show', $produto->id) }}" role="button">Detalhes</a>
                        </div>
                    </td>
                </tr>
            @empty
                <p> Não existem produtos cadastrados </p>
            @endforelse
        </tbody>
    </table>

    @if ($filters)
        {!! $produtos->appends($filters)->links() !!}
    @else
        {!! $produtos->links() !!}
    @endif

@endsection

<!-- Anotações

    {{-- Utilizando a "TAG" {{ valor }} você lê o valor informado SEM as tags em si, ex: <h1> <script> <strong> e afins... serão escritos como: <h1>valor</h1> --}}
    {{-- Utilizando a "TAG" {!! valor !!} você lê o valor informado COM as tags em si, ex: <h1> <script> <strong> e afins... serão escritos como: valor --}}

-->

{{--
    @push('styles')
    <style>
        .last {
            background-color: #eee;
        }
    </style>
    @endpush

    @push('scripts')
        <script>
            document.body.style.background = '#d6d6d6'
        </script>
    @endpush
--}}
