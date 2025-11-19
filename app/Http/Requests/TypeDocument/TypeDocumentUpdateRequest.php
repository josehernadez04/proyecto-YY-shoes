<?php

namespace App\Http\Requests\TypeDocument;

use Illuminate\Foundation\Http\FormRequest;

class TypeDocumentUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|string|max:10|unique:type_documents,code,'.$this->route('id'),
            'description' => 'required|string|max:255',

        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'El código del documento es obligatorio.',
            'code.max' => 'El código no puede tener más de 10 caracteres.',
            'code.unique' => 'Este código ya está registrado.',

            'description.required' => 'La descripción es obligatoria.',
            'description.max' => 'La descripción no puede tener más de 255 caracteres.',
        ];
    }
}
