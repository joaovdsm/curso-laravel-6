@extends('admin.template.app')

@section('title', 'Cadastrar')

@section('content')

    <h1> Cadastrar um novo produto </h1>

    <form action="{{ route('produtos.store') }}" method="post">
        @csrf

        {{-- A linha de código a baixo, representa o mesmo que o @csrf logo a cima.
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        --}}

        <input type="text" name="inp_nome" id="inp_nome" placeholder="Nome do produto...">

        <input type="number" name="inp_valor" id="inp_valor" placeholder="Valor do produto...">

        <button type="submit">Enviar</button>
    </form>

@endsection
