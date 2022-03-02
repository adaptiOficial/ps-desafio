<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->access_level == 0) return true;
        else return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' =>[
                'required', 'min:2'
            ],
            'preco' =>[
                'required', 'numeric', 'gt:0'
            ],
            'descricao' =>[
                'required', 'min:2'
            ],
            'quantidade' =>[
                'required', 'numeric', 'gte:1'
            ],
            'imagem' =>[
                'required', 'image'
            ],
            'categoria_id' =>[
                'required'
            ]
        ];
    }
}
