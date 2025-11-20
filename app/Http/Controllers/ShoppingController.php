<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shopping\ShoppingStoreRequest;
use App\Http\Requests\Shopping\ShoppingUpdateRequest;
use App\Models\Shopping;
use App\Models\Provider;
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
        return view('Dashboard.Shopping.Create');
    }

    public function store(ShoppingStoreRequest $request)
    {
        $shopping = new Shopping();
        $shopping->date = $request->date;
        $shopping->total = $request->total;
        $shopping->provider_id = $request->provider_id;
        $shopping->user_id = $request->user_id;
        $shopping->save();

        return redirect()->route('Shopping.Index');
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
        $shopping->total = $request->total;
        $shopping->provider_id = $request->provider_id;
        $shopping->user_id = $request->user_id;
        $shopping->save();

        return redirect()->route('Shopping.Index');
    }
}
