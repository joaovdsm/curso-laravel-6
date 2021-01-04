<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', function() {
    return "Seja bem-vindo de volta!";
})->name('login');

Route::group([
    // 'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    Route::get('/painel', 'BaseController@painel')->name('painel');

    Route::get('/empresa', 'BaseController@empresa')->name('empresa');

    Route::get('/', function() {
        return redirect()->route('painel');
    })->name('home');

});

Route::resource('produtos', 'ProductController');

/* Executando as mesmas rotas presentes dentro do comando logo a cima, executar neste padrão caso precise de uma maior customização.

    Route::get('produtos', 'ProductController@index')->name('produtos.index');

    Route::get('produtos/{id}', 'ProductController@show')->name('produtos.show');

    Route::get('produtos/create', 'ProductController@create')->name('produtos.create');
    Route::post('produtos', 'ProductController@store')->name('produtos.store');

    Route::get('produtos/{id}/edit', 'ProductController@edit')->name('produtos.edit');
    Route::put('produtos/{id}', 'ProductController@update')->name('produtos.update');

    Route::delete('produtos/{id}', 'ProductController@destroy')->name('produtos.destroy');

*/

Route::get('/', function () {
    return view('welcome');
});

/* Anotações

    //Grupo de rotas

    Route::middleware(['auth'])->group(function() {

        Route::prefix('admin')->group(function() {

            Route::namespace('Admin')->group(function() {

                Route::name('admin.')->group(function() {

                    Route::get('/painel', 'BaseController@painel')->name('painel');
                    // Logo a baixo um exemplo de como ficaria sem o pre-set do grupo de rotas name.
                    // Route::get('/painel', 'BaseController@painel')->name('admin.painel');

                    Route::get('/produtos', 'BaseController@produtos')->name('produtos');

                    Route::get('/empresa', 'BaseController@empresa')->name('empresa');

                    Route::get('/', function() {
                        return redirect()->route('admin.painel');
                    })->name('home');

                });

                // Logo a baixo um exemplo da forma que ficaria sem a utilização do grupo de rotas namespace.
                // Route::get('/painel', 'Admin\BaseController@painel')->name('painel');

            });

        });

    });

    //Rota de redirecionamento, utilizando nome para a rota; Desta forma fica muito mais fácil ajustar as rotas em uma manutenção.
    Route::get('/redirecionamento1', function() {
        return redirect()->route('redirecionamentoFinal');
    });

    Route::get('/redirecionamento2', function() {
        return "Aqui fica a rota já redirecionada.";
    })->name('redirecionamentoFinal');

    //Desta forma o valor: idProduto não é obrigatório.
    Route::get('/produtos/{idProduto?}', function($idProduto = '') {
        return "Produto(s): {$idProduto}";
    });

    //Caso não haja uma / depois do parametro, o nome contigo na function e no callback não precisa ser o mesmo do parametro.
    Route::get('/categoria/{flag}', function($prm1) {
        return "Itens da categoria: {$prm1}";
    });

    //Caso haja uma / depois do parametro, o nome contigo na function e no callback precisa ser o mesmo do parametro.
    Route::get('/categorias/{cat}/posts', function($cat) {
        return "Itens da categoria: {$cat}";
    });

    Route::get('/', function () {
        return view('welcome');
    });

*/
