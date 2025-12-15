<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shopping\ShoppingStoreRequest;
use App\Http\Requests\Shopping\ShoppingUpdateRequest;
use App\Models\Shopping;
use App\Models\Provider;
use App\Models\Product;
use App\Models\User;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShoppingsController extends Controller
{
    public function index()
    {
        // $shopping = Shopping::all();
        $shopping = Shopping::withSum('details', 'subtotal')
        ->with(['provider', 'user'])
        ->get();
        return view('Dashboard.Shoppings.Index', compact('shopping'));
    }

    public function create()
    {
        $providers = Provider::get();
        $typeDocuments = TypeDocument::all();
        return view('Dashboard.Shoppings.Create', compact('providers', 'typeDocuments'));
    }

    public function store(ShoppingStoreRequest $request)
    {
        $shopping = new Shopping();
        $shopping->date = $request->date;
        $shopping->provider_id = $request->provider_id;
        $shopping->user_id = Auth::id();
        $shopping->save();

        return redirect()->route('Shoppings.Show', $shopping->id);
    }
    public function show($id)
    {
        $tallas = ['34', '35', '36', '37', '38', '39', '40', '41', '42', '43'];
        $shopping = Shopping::with('provider.type_document', 'user.type_document', 'details.product')->findOrFail($id);
        return view('Dashboard.Shoppings.Show', compact('shopping', 'tallas'));
    }

    public function edit($id)
    {
        // $shopping = Shopping::findOrFail($id);
        $shopping = Shopping::withSum('details', 'subtotal')->findOrFail($id);
        $providers = Provider::all();
        $users = User::all();
        return view('Dashboard.Shoppings.Edit', compact('shopping','providers','users'));
    }

    public function update(ShoppingUpdateRequest $request, $id)
    {
        $shopping = Shopping::findOrFail($id);
        $shopping->date = $request->date;
        $shopping->provider_id = $request->provider_id;
        $shopping->user_id = $request->user_id;
        $shopping->save();

        return redirect()->route('Shoppings.Index');
    }
}
