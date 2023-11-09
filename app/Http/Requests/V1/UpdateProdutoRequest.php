<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
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
                    'valor' => ['required', 'numeric'],
                    'descricao' => ['required'],
                    'fornecedor_id' => ['required', 'integer'],
                ];
            }
            else
            {
                return [
                    'nome' => ['sometimes','required'],
                    'valor' => ['sometimes','required', 'numeric'],
                    'descricao' => ['sometimes','required'],
                    'fornecedor_id' => ['sometimes','required', 'integer'],
                ];
            }
        
    }
}
