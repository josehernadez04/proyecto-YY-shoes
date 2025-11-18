<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:100', 'string', 'unique:categories,name,'.$this->route('id').',id'],
            'description' => ['nullable', 'string', 'max:500']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de la categoria'
        ];
    }
}
