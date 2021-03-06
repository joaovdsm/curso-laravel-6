@extends('admin.template.app')

@section('title', 'Cadastrar')

@section('content')

    <h1> Cadastrar um novo produto </h1>

    <form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">

        @include('admin.pages.produtos._partials.form')

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary"> Voltar </a>
        </div>

    </form>

@endsection
