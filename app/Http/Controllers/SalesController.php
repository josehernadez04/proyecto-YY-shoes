<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Http\Requests\Sale\SaleStoreRequest;
use App\Http\Requests\Sale\SaleUpdateRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::with('client')->get();
        return view('Dashboard.Sales.Index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::get();
        return view('Dashboard.Sales.Create', compact('clients'));
    }

    public function store(SaleStoreRequest $request)
    {
        $sale = new Sale();
        $sale->client_id = $request->client_id;
        $sale->user_id = Auth::user()->id;

        $sale->save();

        return redirect()->route('Sales.Index');
    }

    public function show($id)
    {
        $tallas = ['34', '35', '36', '37', '38', '39', '40', '41', '42', '43'];
        $sale = Sale::with('client.type_document', 'user.type_document', 'details.product')->findOrFail($id);
        return view('Dashboard.Sales.Show', compact('sale', 'tallas'));
    }

    public function edit($id)
    {
        $sales = Sale::findOrFail($id);
        $clients = Client::all();
        return view('Dashboard.Sales.Edit', compact('sales', 'clients'));
    }

    public function update(SaleUpdateRequest $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->client_id = $request->client_id;

        $sale->save();

        return redirect()->route('Sales.Index');
    }
}


