<?php

namespace App\Http\Requests;

use App\Models\Categoria;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaUpdateRequest extends FormRequest
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
            'categoria' => [
                'required', Rule::unique((new Categoria())->getTable())->ignore($this->route()->categoria->id ?? null)
                //Caso não exista, pode criar; Ele ignora o id atual para saber por meio do unique se ele existe em outros.
            ]
        ];
    }
}
