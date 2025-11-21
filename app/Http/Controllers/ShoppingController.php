<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shopping\ShoppingStoreRequest;
use App\Http\Requests\Shopping\ShoppingUpdateRequest;
use App\Models\Shopping;
use App\Models\Provider;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index()
    {
        $shopping = Shopping::all();
        return view('Dashboard.Shopping.Index', compact('shopping'));
    }

    public function create()
    {
        $providers = Provider::get();
        $users = User::get();
        return view('Dashboard.Shopping.Create', compact('providers', 'users'));
    }

    public function store(ShoppingStoreRequest $request)
    {
        $shopping = new Shopping();
        $shopping->date = $request->date;
        $shopping->provider_id = $request->provider_id;
        $shopping->user_id = $request->user_id;
        $shopping->save();

        return redirect()->route('Shopping.Show', $shopping->id);
    }
    public function show($id)
    {
        $tallas = ['34', '35', '36', '37', '38', '39', '40', '41', '42', '43'];
        $shopping = Shopping::with('provider.type_document', 'user.type_document', 'details.product')->findOrFail($id);
        return view('Dashboard.Shopping.Show', compact('shopping', 'tallas'));
    }

    public function edit($id)
    {
        $shopping = Shopping::findOrFail($id);
        $providers = Provider::all();
        $users = User::all();
        return view('Dashboard.Shopping.Edit', compact('shopping','providers','users'));
    }

    public function update(ShoppingUpdateRequest $request, $id)
    {
        $shopping = Shopping::findOrFail($id);
        $shopping->date = $request->date;
        $shopping->provider_id = $request->provider_id;
        $shopping->user_id = $request->user_id;
        $shopping->save();

        return redirect()->route('Shopping.Index');
    }
}
