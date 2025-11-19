<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeDocument\TypeDocumentStoreRequest;
use App\Http\Requests\TypeDocument\TypeDocumentUpdateRequest;
use App\Models\TypeDocument;

class TypeDocumentController extends Controller
{
    public function index()
    {

        $typedocuments = TypeDocument::all();

        return view('Dashboard.TypeDocuments.Index', compact('typedocuments'));

    }

    public function create()
    {
        $typedocuments = TypeDocument::all();

        return view('Dashboard.TypeDocuments.Create', compact('typedocuments'));
    }

    public function store(TypeDocumentStoreRequest $request)
    {
        TypeDocument::create([
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()->route('TypeDocuments.Index')
            ->with('success', 'Tipo de documento creado correctamente.');
    }

    public function edit($id)
    {
        $typedocument = TypeDocument::findOrFail($id);

        return view('Dashboard.TypeDocuments.Edit', compact('typedocument'));
    }

    public function update(TypeDocumentUpdateRequest $request, $id)
    {
        $typedocument = TypeDocument::findOrFail($id);

        $typedocument->update([
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()->route('TypeDocuments.Index')
            ->with('success', 'Tipo de documento actualizado correctamente.');
    }

    public function delete($id)
    {
        $typedocuments = TypeDocument::findOrFail($id);
        $typedocuments->delete();

        return redirect()->route('TypeDocuments.Index');
    }
}
