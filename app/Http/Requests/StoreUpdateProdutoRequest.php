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
        return [
            'inp_nome' => 'required|min:5|max:100',
            'inp_valor' => 'required|min:3|max:100',
            'inp_file' => 'required|image'
        ];
    }

    public function messages(){
        return [
            'inp_nome.required' => 'O nome precisa ser preenchido',
            'inp_nome.min' => 'Ops! O nome precisa ter no minimo 5 caracteres',
            'inp_valor.required' => 'O valor precisa ser preenchido',
            'inp_file.required' => 'O envio de uma foto é obrigatório'
        ];
    }
}
