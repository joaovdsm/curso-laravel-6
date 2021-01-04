<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;

        // $this->middleware(['auth'])->only([
        //     'create',
        //     'store',
        //     'edit',
        //     'update',
        //     'destroy'
        // ]);

        // Retira a utilização dos middlewares informados nas rotas passadas dentro de except
        // $this->middleware(['auth'])->except([
        //     'index',
        //     'show'
        // ]);

        // Testando a parametrização do request ?prm1=valor é o que mostra com o código abaixo.
        // dd($this->request->prm1);
    }

    public function index(){
        $produtos = ['arroz', 'feijao', 'farinha', 'batata', 'bife'];
        $valores = ['5,00', '6,00', '3,00', '4,50', '10,00'];

        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
            'valores' => $valores
        ]);

        //Pode ser utilizar também o método compact, como no exemplo a baixo.
        // return view('/Produtos/produtos', compact('lista', 'valores'));
    }

    public function show($idProduto){
        return "O produto selecionado para a visualização é: {$idProduto}";
    }

    public function create(){
        return view('admin.pages.produtos.create');
    }

    public function store(StoreUpdateProdutoRequest $request){

        // $request->validate([
        //     'inp_nome' => 'required|min:5|max:100',
        //     'inp_valor' => 'required|min:3|max:100',
        //     'inp_file' => 'required|image'
        // ]);

        // dd('Ok');

        if($request->file('inp_file')->isValid()) {

            // Com as linhas de comando a baixo você gera um nome para o arquivo.
            $fileName = md5($request->inp_nome) . "." . $request->inp_file->extension();
            dd($request->file('inp_file')->storeAs('produtos', $fileName));

            // Com a linha de comando a baixo é gerado por padrão um nome aleatório para o arquivo.
            // dd($request->file('inp_file')->store('produtos'));
        }
    }

    public function edit($idProduto){
        return view('admin.pages.produtos.edit', compact('idProduto'));
    }

    public function update(Request $request, $idProduto){
        dd("Modificando o produto: {$idProduto}");
    }

    public function destroy($idProduto){
        return "O produto a ser deletado é: {$idProduto}";
    }
}
