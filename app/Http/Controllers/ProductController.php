<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;

        $this->middleware(['auth'])->only([
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);

        // Retira a utilização dos middlewares informados nas rotas passadas dentro de except
        // $this->middleware(['auth'])->except([
        //     'index',
        //     'show'
        // ]);

        //Testando a parametrização do request ?prm1=valor é o que mostra com o código abaixo.
        //dd($this->request->prm1);
    }

    public function index(){
        $lista = ['arroz', 'feijao', 'farinha', 'batata', 'bife'];

        return $lista;
    }

    public function show($idProduto){
        return "O produto selecionado para a visualização é: {$idProduto}";
    }

    public function create(){
        return "Formulário de criação de um produto";
    }

    public function store(){
        return "O produto foi criado";
    }

    public function edit($idProduto){
        return "Formulário para editar o produto: {$idProduto}";
    }

    public function update($idProduto){
        return "O produto a ser editado é: {$idProduto}";
    }

    public function destroy($idProduto){
        return "O produto a ser deletado é: {$idProduto}";
    }
}
