<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'image'];

    public function search($pesquisar = null) {
        $results = $this->where( function($query) use($pesquisar) {
            if($pesquisar) {
                // O código abaixo só apresenta resultado se o campo de pesquisa for EXATAMENTE o mesmo do campo do banco de dados.
                // $query->where('nome', '=', $pesquisar);

                // Puxa qualquer campo do banco de dados que tenha o conteudo informado na pesquisa.
                $query->where('nome', 'LIKE', "%{$pesquisar}%");
            }
        })//->toSql();
        ->paginate();

        return $results;
    }
}
