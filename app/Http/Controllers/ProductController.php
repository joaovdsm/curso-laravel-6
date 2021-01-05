<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Produto $product){
        $this->repository = $product;
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

    public function search(Request $request){

        $filters = $request->except('_token');
        $produtos =  $this->repository->search($request->pesquisar);

        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
            'filters' => $filters
        ]);
    }

    public function index(Request $request){

        $filters = $request->except('_token');
        $produtos =  $this->repository->paginate();

        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
            'filters' => $filters
        ]);

        //Pode ser utilizar também o método compact, como no exemplo a baixo.
        // Versões atualizadas do PHP NÃO possuem mais o compact.

        // return view('/Produtos/produtos', compact('lista', 'valores'));
    }

    public function show($idProduto){

        // Possiveis formar de retornar um registro pelo ID.
        // $produto =  $this->repository->where('id', $idProduto)->first();
        // $produto =  $this->repository->where('id', $idProduto)->get();

        if(!$produto =  $this->repository->find($idProduto)) {
            return redirect()->back();
        }
        else {
            return view('admin.pages.produtos.show', [
                'produto' => $produto
            ]);
        }
    }

    public function create(){
        return view('admin.pages.produtos.create');
    }

    public function store(StoreUpdateProdutoRequest $request){

        $data = $request->only('nome', 'preco');

        if($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('produtos');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('produtos.index');

        // $request->validate([
        //     'nome' => 'required|min:5|max:100',
        //     'preco' => 'required|min:3|max:100',
        //     'image' => 'required|image'
        // ]);

        // dd('Ok');

        // if($request->file('inp_file')->isValid()) {

            // Com as linhas de comando a baixo você gera um nome para o arquivo.
            // $fileName = md5($request->inp_nome) . "." . $request->inp_file->extension();
            // dd($request->file('inp_file')->storeAs('produtos', $fileName));

            // Com a linha de comando a baixo é gerado por padrão um nome aleatório para o arquivo.
            // dd($request->file('inp_file')->store('produtos'));
        // }
    }

    public function edit($idProduto){
        $produto =  $this->repository->find($idProduto);

        return view('admin.pages.produtos.edit', [
            'produto' => $produto
        ]);

        // Versões atualizadas do PHP NÃO possuem mais o compact.
        // return view('admin.pages.produtos.edit', compact('idProduto'));
    }

    public function update(StoreUpdateProdutoRequest $request, $idProduto){

        if(!$produto =  $this->repository->find($idProduto))
            return redirect()->route('produtos.index');

        $data = $request->all();

        if($request->hasFile('image') && $request->image->isValid()) {
            if($produto->image && Storage::exists($produto->image)){
                Storage::delete($produto->image);
            }

            $imagePath = $request->image->store('produtos');
            $data['image'] = $imagePath;
        }

        $produto->update($data);
        return redirect()->route('produtos.index');

    }

    public function destroy($idProduto){
        if(!$produto =  $this->repository->find($idProduto))
            return redirect()->route('produtos.index');

        if($produto->image && Storage::exists($produto->image)){
            Storage::delete($produto->image);
        }

        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
