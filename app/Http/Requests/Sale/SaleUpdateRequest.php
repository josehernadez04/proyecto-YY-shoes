<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class SaleUpdateRequest extends FormRequest
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
            'count' => ['required', 'numeric'],
            'unit_price' => ['required', 'numeric'],
            'subtotal' => ['required', 'numeric'],
            'product_id' => ['required', 'exists:products,id'],
        ];
    }

    public function attributes()
    {
        return [
            'count' => 'cantidad',
            'unit_price' => 'precio unitario',
            'subtotal' => 'subtotal',
            'product_id' => 'producto',
        ];
    }
}
