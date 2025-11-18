<?php

namespace App\Http\Requests\Providers;

use Illuminate\Foundation\Http\FormRequest;

class ProviderUpdateRequest extends FormRequest
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
            'document' => ['required','string','max:20','unique:providers,document'],
            'type_document_id' => ['required','numeric','exists:type_documents,id'],
            'name'=>['required','string','max:100'],
            'phone'=>['nullable','regex:/^[0-9]+$/','max:20'],
            'address'=>['nullable','string','max:150'],
            'email'=>['nullable','email','max:100'],

        ];
    }
    public function attributes()
    {
        return [
            'document' => 'numero de documento',
            'type_document_id' => 'tipo de documento',
            'name' => 'nombre del provedor',
            'phone' => 'teléfono',
            'address' => 'dirección',
            'email' => 'correo electrónico',
        ];
    }
}
