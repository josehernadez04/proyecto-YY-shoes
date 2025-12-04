<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

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
            // 'size' => ['required','regex:/^[0-9]+$/','max:4'],
            'color' => ['required','string','max:20'],
            'purchase_price'  => ['required','integer','min:100','max:10000000'],
            'sale_price' => ['required','integer','min:100','max:10000000'],
            // 'stock' => ['required', 'numeric','max:20'],
            'category_id' => ['required','numeric'],
            'provider_id' => ['required','numeric']
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
            // 'stock' => 'stock',
            'category_id' => 'categoria',
            'provider_id' => 'proveedor'
        ];
    }
}
