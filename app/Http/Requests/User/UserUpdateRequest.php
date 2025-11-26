<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class UserUpdateRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        if ($this->ajax() || $this->wantsJson()) {
            throw new HttpResponseException(response()->json([
                'message' => 'Error de validación.',
                'errors'  => $validator->errors()
            ], 422));
        }

        parent::failedValidation($validator);
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // el parámetro de la ruta es /Update/{id}
        $userId = $this->route('id');

        return [
            'name'             => ['required', 'string', 'max:75'],
            'document'         => ['required', 'digits_between:5,20', 'unique:users,document,' . $userId],
            'type_document_id' => ['required', 'integer', 'exists:type_documents,id'],
            'phone_number'     => ['required', 'digits_between:10,15'],
            'address'          => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'string',
                'max:100',
                'email:rfc,dns',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'birthdate' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            ],
            // contraseña opcional
            'password'         => ['nullable', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['nullable', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'required'        => 'El campo :attribute es requerido.',
            'string'          => 'El campo :attribute debe ser una cadena de caracteres.',
            'email'           => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'email.email' => 'Ingresa un correo con formato válido, por ejemplo ejemplo@dominio.com.',
            'unique'          => 'El campo :attribute ya ha sido tomado.',
            'max'             => 'El campo :attribute no debe exceder los :max caracteres.',
            'min'             => 'El campo :attribute debe tener al menos :min caracteres.',
            'digits_between'  => 'El campo :attribute debe tener entre :min y :max dígitos.',
            'confirmed'       => 'El campo :attribute no coincide con la confirmación.',
            'exists'          => 'El campo :attribute no existe.',
        ];
    }

    public function attributes()
    {
        return [
            'name'             => 'nombre completo',
            'document'         => 'número de documento',
            'type_document_id' => 'tipo de documento',
            'phone_number'     => 'número de teléfono',
            'address'          => 'dirección',
            'email'            => 'correo electrónico',
            'password'         => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
        ];
    }
}
