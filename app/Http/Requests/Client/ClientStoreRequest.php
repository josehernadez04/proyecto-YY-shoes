<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'type_document_id' => ['required', 'integer', 'exists:type_documents,id'],
            'document' => ['required', 'digits_between:5,20', 'regex:/^[0-9]+$/', 'min:5', 'max:20', 'unique:clients,document'],
            'phone' => ['nullable', 'string', 'digits_between:10,15', 'regex:/^[0-9]+$/', 'min:10', 'max:15'],
            'email' => ['nullable', 'string', 'email', 'max:100', 'email:rfc,dns'],
            'address' => ['required', 'string', 'min:9', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido.',
            'string' => 'El campo :attribute debe ser una cadena de caracteres.',
            'max' => 'El campo :attribute no debe exceder los :max caracteres.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'exists' => 'El campo :attribute no existe.',
            'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
            'regex' => 'El campo :attribute debe ser un número de documento.',
            'unique' => 'El campo :attribute ya ha sido tomado.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónica valida.',
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
