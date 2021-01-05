<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);

        return [
            'nome' => "required|min:5|max:100|unique:produtos,nome,{$id},id",
            'preco' => 'required|min:3|max:100',
            'image' => 'nullable|image'
        ];
    }

    public function messages(){
        return [
            'nome.unique' => 'Já existe um produto com este nome',
            'nome.required' => 'O nome do produto precisa ser preenchido',
            'nome.min' => 'Ops! O nome do produto precisa ter no minimo 5 caracteres',
            'preco.required' => 'O valor do produto precisa ser preenchido',
            'preco.min' => 'O valor do produto precisa ter no minimo 3 caracteres'
        ];
    }
}
