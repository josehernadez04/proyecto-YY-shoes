<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'purchase_price'  => ['required','integer','min:100','max:10000000'],
            'sale_price' => ['required','integer','min:100','max:10000000'],
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
            'category_id' => 'categoria',
            'provider_id' => 'proveedor'
        ];
    }
}
