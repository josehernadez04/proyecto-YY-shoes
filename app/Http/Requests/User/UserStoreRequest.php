<?php

namespace App\Http\Requests\User;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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
        return [
            'name'            => ['required', 'string', 'max:75'],
            'document' => ['required', 'digits_between:5,20', 'unique:users,document'],
            'type_document_id' => ['required', 'integer', 'exists:type_documents,id'],
            'phone_number'    => ['required', 'digits_between:10,15'],
            'address'         => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'string',
                'max:100',
                'email:rfc,dns', // valida bien formato y dominio
                Rule::unique('users', 'email')->ignore($userId ?? null),
            ],
            'birthdate' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            ],
            'password'        => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'required'   => 'El campo :attribute es requerido.',
            'string'     => 'El campo :attribute debe ser una cadena de caracteres.',
            'email'      => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'email.email' => 'Ingresa un correo con formato válido, por ejemplo ejemplo@dominio.com.',
            'birthdate.date' => 'La fecha de nacimiento no es válida.',
            'birthdate.before_or_equal' => 'El usuario debe ser mayor de 18 años.',
            'unique'     => 'El campo :attribute ya ha sido tomado.',
            'max'        => 'El campo :attribute no debe exceder los :max caracteres.',
            'min'        => 'El campo :attribute debe tener al menos :min caracteres.',
            'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
            'confirmed'  => 'El campo :attribute no coincide con la confirmación de contraseña.',
            'in'         => 'El campo :attribute es invalido.',
            'exists'     => 'El campo :attribute no existe.',
        ];
    }

    public function attributes()
    {
        return [
            'name'             => 'nombre completo',
            'document   '  => 'número de documento',
            'type_document_id' => 'tipo de documento',
            'phone_number'     => 'número de teléfono',
            'address'          => 'dirección',
            'email'            => 'correo electrónico',
            'password'         => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
            'birthdate' => 'fecha de nacimiento',
        ];
    }
}
