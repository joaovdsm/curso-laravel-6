@extends('admin.template.app')

@section('title', 'Cadastrar')

@section('content')

    <h1> Cadastrar um novo produto </h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        {{-- A linha de código a baixo, representa o mesmo que o @csrf logo a cima.
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        --}}

        <input type="text" name="inp_nome" id="inp_nome" value="{{ old('inp_nome') }}" placeholder="Nome do produto...">

        <input type="number" name="inp_valor" id="inp_valor" value="{{ old('inp_valor') }}" placeholder="Valor do produto...">

        <input type="file" name="inp_file" id="inp_file">

        <button type="submit">Cadastrar</button>
    </form>

@endsection
