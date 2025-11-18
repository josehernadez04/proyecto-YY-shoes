<?php

namespace App\Http\Controllers;

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
        $typedocuments = new TypeDocument();
        $typedocuments->code = $request->code;
        $typedocuments->descripcion = $request->descripcion;
        $typedocuments->save();

        return redirect()->route('TypeDocuments.Index');
    }

    public function edit($id)
    {
        $typedocuments = TypeDocument::all();
        $typedocuments = TypeDocument::findOrFail($id);

        return view('Dashboard.TypeDocuments.Edit', compact('TypeDocuments', 'typedocument'));
    }

    public function update(TypeDocumentStoreRequest $request)
    {
        $typedocuments = new TypeDocument();
        $typedocuments->code = $request->code;
        $typedocuments->descripcion = $request->descripcion;
        $typedocuments->save();

        return redirect()->route('TypeDocuments.Index');
    }

    public function delete($id)
    {
        $typedocuments = TypeDocument::findOrFail($id);
        $typedocuments->delete();

        return redirect()->route('TypeDocuments.Index');
    }
}
