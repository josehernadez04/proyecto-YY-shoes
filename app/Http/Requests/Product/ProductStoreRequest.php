<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'reference' => ['required','string','max:20'],
            'name' => ['required','string','max:100'],
            'description' => ['nullable','string','max:500'],
            'color' => ['required','string','max:20'],
            'purchase_price' => ['required','regex:/^[0-9]+$/','max:20'],
            'sale_price' => ['required','regex:/^[0-9]+$/','max:20'],
            'category_id' => ['required', Rule::exists('categories', 'id')->where(function ($query) {
                $query->where('is_active', true);
            }),],
            'provider_id' => ['required', Rule::exists('providers', 'id')->where(function ($query) {
                $query->where('is_active', true);
            }),]
        ];
    }
    public function attributes()
    {
        return [
            'reference' => 'referencia',
            'name' => 'nombre',
            'description' => 'descripción',
            'size' => 'talla',
            'color' => 'color',
            'purchase_price' => 'precio compra',
            'sale_price' => 'precio venta',
            'stock' => 'stock',
            'category_id' => 'categoria',
            'provider_id' => 'proveedor'
        ];
    }
}
