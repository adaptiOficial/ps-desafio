<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required','min:3','max:100'],
            'imagem' => 'image',
            'preco' => ['required'],
            'descricao' => ['required','min:3','max:254'],
            'quantidade' => ['required','min:0','max:100']
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => ['Esse campo é necessário!'],
            'nome.max' => 'O máximo de caracteres deste campo é 100',
            'nome.min' => 'O mínimo de caracteres deste campo é 3',
            'imagem.image' => 'Incompatível',
            'preco.required' => ['Esse campo é necessário!'],
            'descricao.required' => ['Esse campo é necessário!'],
            'descricao.max' => 'O máximo de caracteres deste campo é 254',
            'descricao.min' => 'O mínimo de caracteres deste campo é 3',
            'quantidade.required' => ['Esse campo é necessário!'],
        ];
    }
}
