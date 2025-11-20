<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Http\Requests\Sale\SaleStoreRequest;
use App\Http\Requests\Sale\SaleUpdateRequest;
class SalesController extends Controller
{
    public function index()
    {
    $sales = Sale::all();
    return view('Dashboard.Sales.Index', compact('sales'));
    }
    public function create()
    {
        $products = Product::get();
        return view('Dashboard.Sales.Create', compact('products'));
    }
    public function store(SaleStoreRequest $request)
    {
        $sale = new Sale();
        $sale->count = $request->count;
        $sale->unit_price = $request->unit_price;
        $sale->subtotal = $request->subtotal;
        $sale->product_id = $request->product_id;

        $sale->save();

        return redirect()->route('Sales.Index');
    }
    public function edit($id)
    {
        $sales = Sale::findOrFail($id);
        $products = Product::all();
        return view('Dashboard.Sales.Edit', compact('sales', 'products'));
    }

    public function update(SaleUpdateRequest $request, $id)
    {
        $sale = sale::findOrFail($id);
        $sale->count = $request->count;
        $sale->unit_price = $request->unit_price;
        $sale->subtotal = $request->subtotal;
        $sale->product_id = $request->product_id;

        $sale->save();

        return redirect()->route('Sales.Index');
    }
}


