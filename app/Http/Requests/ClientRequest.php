<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'     => 'required|string',
            'document' => 'required|string|size:11|unique:clients,document',
            'birthday' => 'required|date',
            'phone'    => 'string|between:10,11',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'     => 'Nome',
            'document' => 'CPF',
            'birthday' => 'Data de nascimento',
            'phone'    => 'Telefone',
        ];
    }
}
