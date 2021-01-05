
@include('admin.includes.alert')

@csrf

{{-- A linha de código a baixo, representa o mesmo que o @csrf logo a cima.
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
--}}

<div class="mb-3">
    <input class="form-control" type="text" name="nome" id="nome" value="{{ $produto->nome ??  old('nome')  }}" placeholder="Nome do produto..." aria-describedby="nomeDoProduto">
</div>

<div class="mb-3">
    <input class="form-control" type="number" name="preco" id="preco" value="{{ $produto->preco ?? old('preco')  }}" placeholder="Valor do produto...">
</div>

<div class="mb-3">
    <input class="form-control" type="file" name="image" id="image">
</div>
