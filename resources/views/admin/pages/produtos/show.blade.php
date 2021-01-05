@extends('admin.template.app')

@section('title', 'Visualizar')

@section('content')

    <h1> Visualizando o produto: {{ $produto->nome }} </h1>

    <form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">

        @include('admin.pages.produtos._partials.form')

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a style="color: #fff"  href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning"> Editar </a>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary"> Voltar </a>
        </div>

    </form>

@endsection
