@extends('admin.template.app')

@section('title', 'Editar')

@section('content')

    <h1> Editando o produto: {{ $produto->nome }}  </h1>

    <form action="{{ route('produtos.update', $produto->id) }}" method="post" enctype="multipart/form-data">

        @method('PUT')
        @include('admin.pages.produtos._partials.form')

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <button type="submit" class="btn btn-success">Salvar</button>

        <a href="{{ route('produtos.index') }}" class="btn btn-secondary"> Voltar </a>

    </form>

        <form action="{{ route('produtos.destroy', $produto->id) }}"  method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>

    <div>

@endsection
