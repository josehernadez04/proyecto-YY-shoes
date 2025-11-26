<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')
            ],
            'description' => ['nullable', 'string', 'max:250'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de la categoría'
        ];
    }
}
