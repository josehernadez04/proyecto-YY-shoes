<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'type_document_id' => ['required', 'numeric', 'exists:type_documents,id'],
            'document' => ['required', 'regex:/^[0-9]+$/', 'max:20', 'unique:clients,document,'.$this->route('id').',id'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'string', 'email', 'max:100'],
            'address' => ['nullable', 'string', 'max:150'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre del cliente',
            'type_document_id' => 'tipo de documento',
            'document' => 'número de documento',
            'phone' => 'teléfono',
            'email' => 'correo electrónico',
            'address' => 'dirección',
        ];
    }
}
