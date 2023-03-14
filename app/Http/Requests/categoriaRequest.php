<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'categoria' => ['required','min:3','max:100']
        ];
    }
    public function messages()
    {
        return [
            'categoria.required' => ['Esse campo é necessário!'],//
            'categoria.max' => 'O máximo de caracteres deste campo é 100',
            'categoria.min' => 'O mínimo de caracteres deste campo é 3',

        ];
    }
}
