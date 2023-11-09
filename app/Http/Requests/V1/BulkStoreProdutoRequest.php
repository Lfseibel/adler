<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreProdutoRequest extends FormRequest
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
        return [
            '*.nome' => ['required'],
            '*.valor' => ['required', 'numeric'],
            '*.descricao' => ['required'],
            '*.fornecedor_id' => ['required', 'integer'],
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];

        foreach($this->toArray() as $obj)
        {
            $obj['fornecedorID'] = $obj['fornecedor_id'] ?? null;
            $data[] = $obj;
        }

        $this->merge($data);
    }
}
