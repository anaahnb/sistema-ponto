<?php

namespace App\Http\Requests;

use App\Http\Requests\MessagesRequest;
use Illuminate\Foundation\Http\FormRequest;

class ColaboradorInserirRequest extends FormRequest
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
            'colaborador_cpf' => ['required', 'string', 'cpf'],
            'colaborador_nome' => ['required', 'string'],
            'colaborador_email' => ['required', 'email'],
            'colaborador_data_nascimento' => ['required', 'date'],
            'colaborador_data_admissao' => ['required', 'date'],
            'cargo_id' => ['required', 'integer'],
            'funcao_id' => ['required', 'integer'],
            'colaborador_data_rescisao' => ['nullable', 'date']               
        ];
    }

    public function messages()
    {
        return parent::messages();
    
    }
}
