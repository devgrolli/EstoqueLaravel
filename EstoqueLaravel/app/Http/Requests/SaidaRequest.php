<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaidaRequest extends FormRequest
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
    public function rules(){
        return [
            'produto_id' => 'required',
            'quantidade' => 'required',
            'preco_un' => 'required',
            'data_saida' => 'date',
            'tipo_saidas_id' => 'required',
        ];
    }
}
