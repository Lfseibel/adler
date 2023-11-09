<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedorRequest extends FormRequest
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

        if($method == 'PUT')
        {
            return [
                'nome' => ['required'],
                //pra usar Rule precisa importar la em cima
                //'tipo' => [Rule::in(['A','a','B','b'])] cria a regra que tipo so pode ter esses 4 valores
                'cnpj' => ['required'],
                'senha' => ['required'],
                'email' => ['required','email'],
                'endereco' => ['required'],
                'idade' => ['required'],
                'imagemPerfil' => [],
                'telefone' => ['required']
            ];
        }
        else
        {
            return [
                'nome' => ['sometimes','required'],
                //pra usar Rule precisa importar la em cima
                //'tipo' => [Rule::in(['A','a','B','b'])] cria a regra que tipo so pode ter esses 4 valores
                'cnpj' => ['sometimes','required'],
                'senha' => ['sometimes','required'],
                'email' => ['sometimes','required','email'],
                'endereco' => ['sometimes','required'],
                'idade' => ['sometimes','required'],
                'imagemPerfil' => [],
                'telefone' => ['sometimes','required']
            ];
        }
        
    }

    protected function prepareForValidation()
    {
        if($this->imagePerfil)
        {
            $this->merge([
                'imagem_perfil' => $this->imagemPerfil
            ]);
        }
        
    }
}
