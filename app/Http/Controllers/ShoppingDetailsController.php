<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shopping;
use App\Models\Product;
use App\Models\ShoppingDetail;
use Illuminate\Http\Request;

class ShoppingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shopping_id = $request->shopping_id;
        $tallas = ['34', '35', '36', '37', '38', '39', '40', '41', '42', '43'];
        $products = Product::all();
        return view('Dashboard.ShoppingDetails.Create', compact('products', 'shopping_id', 'tallas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $detail = new ShoppingDetail();
        $detail->quantity = $request->quantity;
        $detail->size = $request->size;
        $detail->price_unit = $product->purchase_price;
        $detail->subtotal = $request->quantity * $product->purchase_price;
        $detail->shopping_id = $request->shopping_id;
        $detail->product_id = $request->product_id;
        $detail->save();

        return redirect()->route('Shopping.Show', $request->shopping_id)->with('success', 'Producto agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
