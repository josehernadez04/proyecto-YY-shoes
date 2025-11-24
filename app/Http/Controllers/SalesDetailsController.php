<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesDetailsController extends Controller
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
        $sale_id = $request->sale_id;
        $tallas = ['34', '35', '36', '37', '38', '39', '40', '41', '42', '43'];
        $products = Product::all();
        return view('Dashboard.SaleDetails.Create', compact('products', 'sale_id', 'tallas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::with('details')->findOrFail($request->product_id);

        $detail = new SaleDetail();
        $detail->quantity = $request->quantity;
        $detail->size = $request->size;
        $detail->price_unit = $product->purchase_price;
        $detail->subtotal = $request->quantity * $product->purchase_price;
        $detail->sale_id = $request->sale_id;
        $detail->product_id = $request->product_id;
        $detail->save();

        $product->details()->where('size', $request->size)->updateOrCreate(
            ['size' => $request->size],
            ['stock' => DB::raw("stock - $request->quantity")]
        );

        return redirect()->route('Sales.Show', $request->sale_id)->with('success', 'Producto agregado correctamente y stock actualizado');
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
