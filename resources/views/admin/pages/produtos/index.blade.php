@extends('admin.template.app')

@section('title', 'Todos')

@component('admin.components.card')

    @slot('title')
        <h3>Titulo do card<h3>
    @endslot

    Conteúdo

@endcomponent

<hr>

@include('admin.includes.alert', ['content' => 'este é o conteúdo do alert'])

<hr>

@section('content')
    @forelse ($produtos as $produto)
        <p class="@if($loop->last) last @endif"> {{ $produto }} </p>
    @empty
        <p> Não existem produtos cadastrados </p>
    @endforelse

    <hr>

    <a href="{{ route('produtos.create') }}"> Cadastrar produto </a>
@endsection

<!-- Anotações

    {{-- Utilizando a "TAG" {{ valor }} você lê o valor informado SEM as tags em si, ex: <h1> <script> <strong> e afins... serão escritos como: <h1>valor</h1> --}}
    {{-- Utilizando a "TAG" {!! valor !!} você lê o valor informado COM as tags em si, ex: <h1> <script> <strong> e afins... serão escritos como: valor --}}

-->

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
