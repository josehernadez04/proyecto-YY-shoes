<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use App\Models\TypeDocument;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
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
        $categories = Category::where('is_active', true)->get();
        $providers = Provider::where('is_active', true)->get();
        $typeDocuments = TypeDocument::get();
        return view('Dashboard.Products.Create', compact('categories', 'providers', 'typeDocuments'));
    }


    public function store(ProductStoreRequest $request)
    {
        $products = new Product();
        $products->reference = $request->reference;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->color = $request->color;
        $products->purchase_price = $request->purchase_price;
        $products->sale_price = $request->sale_price;
        $products->category_id=$request->category_id;
        $products->provider_id =$request->provider_id;
        $products->save();

        return redirect()->route('Products.Index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::where('is_active', true)->get();
        // Si la categoría actual del producto está inactiva, la agregamos solo para mostrarla
        if ($product->category && !$product->category->is_active) {
            $categories->push($product->category);
        }
        $providers = Provider::where('is_active', true)->get();
        // Si el proveedor actual del producto está inactiva, la agregamos solo para mostrarla
        if ($product->provider && !$product->provider->is_active) {
            $providers->push($product->provider);
        }
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
        $product->purchase_price = $request->purchase_price;
        $product->sale_price= $request->sale_price;
        $product->save();
        return redirect()->route('Products.Index');
    }
}


