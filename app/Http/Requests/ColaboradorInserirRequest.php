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
            'colaborador_cpf' => ['required', 'string', 'cpf', 'unique:colaboradores,colaborador_cpf'],
            'colaborador_nome' => ['required', 'string'],
            'colaborador_email' => ['required', 'email', 'unique:colaboradores,colaborador_email'],
            'colaborador_data_nascimento' => ['required', 'date'],
            'colaborador_data_admissao' => ['required', 'date', 'before_or_equal:today'],
            'cargo_id' => ['required', 'integer'],
            'funcao_id' => ['required', 'integer'],
            'colaborador_data_rescisao' => ['nullable', 'date', 'after:data_admissao']               
        ];
    }

    public function messages()
    {
        return parent::messages();

    }
}