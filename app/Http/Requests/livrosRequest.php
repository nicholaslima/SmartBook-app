<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class livrosRequest extends FormRequest
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
            'titulo' => 'required',
            'autor' => 'required',
            'data'=> 'required',
            'paginas' => 'required|max:6',
            'categoria'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'o campo :attribute esta vazio,é necessario prencher o formulario',
            'max' => 'o campo :attribute pode ter no maximo 6 caracteres  '
        ];
    }
}
