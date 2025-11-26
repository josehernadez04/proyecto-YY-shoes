<?php

namespace App\Http\Requests\Providers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // El parámetro en la ruta se llama {id}, no {provider}
        $providerId = $this->route('id'); // o $this->id

        return [
            'document' => [
                'required',
                'digits_between:5,20',
                'regex:/^[0-9]+$/',
                Rule::unique('providers', 'document')->ignore($providerId, 'id'),
            ],
            'type_document_id' => ['required', 'numeric', 'exists:type_documents,id'],
            'name' => ['required', 'string', 'max:80'],

            // solo números y entre 10 y 15 dígitos, pero opcional
            'phone' => ['nullable', 'digits_between:10,15', 'regex:/^[0-9]+$/'],

            'address' => ['nullable', 'string', 'max:150'],
            'email' => ['nullable', 'email:rfc,dns', 'max:100'],
        ];
    }

    public function attributes()
    {
        return [
            'document'         => 'número de documento',
            'type_document_id' => 'tipo de documento',
            'name'             => 'nombre del proveedor',
            'phone'            => 'teléfono',
            'address'          => 'dirección',
            'email'            => 'correo electrónico',
        ];
    }
}
