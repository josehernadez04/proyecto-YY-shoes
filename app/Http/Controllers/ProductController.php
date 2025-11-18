<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Dashboard.Products.Index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('Dashboard.Products.Create', compact('categories', 'providers'));
    }


    public function store(Request $request)
    {
        return $request;
        $products = new Product();
        $products->reference = $request->reference;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->size = $request->size;
        $products->color = $request->color;
        $products->purchase_price = $request->purchase_price;
        $products->sale_price= $request->sale_price;
        $products->category_id=$request->category_id;
        $products->provider_id =$request->provider_id;
        $products->save();

        return redirect()->route('Products.Index');
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('Dashboard.Products.Edit', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->reference = $request->reference;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price= $request->sale_price;
        $product->save();
        return redirect()->route('Products.Index');
    }
}


