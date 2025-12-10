<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Models\TypeDocument;
use App\Http\Requests\Providers\ProviderStoreRequest;
use App\Http\Requests\Providers\ProviderUpdateRequest;

class ProviderController extends Controller
{
    public function index()
    {
    $providers = Provider::with('type_document')->get();
        return view('Dashboard.Providers.Index', compact('providers'));
    }
    public function create()
    {
        $typeDocuments = TypeDocument::all();
        return view('Dashboard.Providers.Create', compact('typeDocuments'));
    }
    public function edit($id)
    {
        $typeDocuments = TypeDocument::all();
        $providers = Provider::findOrFail($id);
        return view('Dashboard.Providers.Edit', compact('typeDocuments','providers'));
    }
    public function store(ProviderStoreRequest $request)
    {
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->type_document_id = $request->type_document_id;
        $provider->document = $request->document;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        $provider->email = $request->email;
        $provider->save();

        if ($request->ajax()) {
            return response()->json([
                'id' => $provider->id,
                'name' => $provider->name,
            ]);
        }

        return redirect()->route('Providers.Index');
    }
    public function update(ProviderUpdateRequest $request, $id)
    {
        $provider = Provider::findOrFail($id);
        $provider->name = $request->name;
        $provider->type_document_id = $request->type_document_id;
        $provider->document = $request->document;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        $provider->email = $request->email;

        $provider->save();

        return redirect()->route('Providers.Index');
    }

    public function ajaxStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type_document_id' => 'required|integer|exists:type_documents,id',
            'document' => 'required|numeric',
            'phone' => 'required|numeric',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255'
        ]);

        $provider = Provider::create([
            'name' => $request->name,
            'type_document_id' => $request->type_document_id,
            'document' => $request->document,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'provider' => $provider
        ]);
    }

}

