<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        $id = $this->route('cliente');
        if($method == 'PUT')
        {
            return [
                'nome' => ['required'],
                'telefone' => ['required'],
                'senha' => ['required'],
                'email' => ['required','email', Rule::unique('clientes', 'email')->ignore($id)],
                'endereco' => ['required'],
                'idade' => ['required'],
                'imagem_perfil' => [],
            ];
        }
        else
        {
            return [
                'nome' => ['sometimes','required'],
                'senha' => ['sometimes','required'],
                'email' => ['sometimes','required','email',Rule::unique('clientes', 'email')->ignore($id)],
                'endereco' => ['sometimes','required'],
                'idade' => ['sometimes','required'],
                'imagemPerfil' => [],
                'telefone' => ['sometimes','required']
            ];
        }
        
    }
}
