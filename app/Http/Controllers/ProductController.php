<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Requests\Product\updateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('details')->get();
        return view('Dashboard.Products.Index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('Dashboard.Products.Create', compact('categories', 'providers'));
    }


    public function store(ProductStoreRequest $request)
    {
        $products = new Product();
        $products->reference = $request->reference;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->color = $request->color;
        // Normalización segura
        $products->purchase_price = $this->normalizeCurrency($request->purchase_price);
        $products->sale_price = $this->normalizeCurrency($request->sale_price);
        // $products->purchase_price = $request->purchase_price;
        // $products->sale_price = $request->sale_price;
        $products->category_id = $request->category_id;
        $products->provider_id = $request->provider_id;


        $products->save();

        return redirect()->route('Products.Index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $providers = Provider::all();
        $products = Product::findOrFail($id);
        return view('Dashboard.Products.Edit', compact('products', 'categories', 'providers'));
    }


    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->reference = $request->reference;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->provider_id = $request->provider_id;
        $product->description = $request->description;
        $product->color = $request->color;
         // Normalización segura
        $product->purchase_price = $this->normalizeCurrency($request->purchase_price);
        $product->sale_price = $this->normalizeCurrency($request->sale_price);
        // $product->purchase_price = $request->purchase_price;
        // $product->sale_price = $request->sale_price;


        $product->save();
        return redirect()->route('Products.Index');
    }

    private function normalizeCurrency($value)
    {
        if (!$value) return 0;

        // Quitar puntos de miles
        $value = str_replace('.', '', $value);

        // Cambiar coma decimal por punto
        $value = str_replace(',', '.', $value);

        return (float) $value;
    }
}
