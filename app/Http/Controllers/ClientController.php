<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientupdateRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\TypeDocument;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('type_document')->get();
        return view('Dashboard.Clients.Index', compact('clients'));
    }

    public function create ()
    {
        $type_documents = TypeDocument::all();
        return view('Dashboard.Clients.Create', compact('type_documents'));
    }

    public function store (ClientStoreRequest $request)
    {
        $clients = new Client();
        $clients->name = $request->name;
        $clients->type_document_id = $request->type_document_id;
        $clients->document = $request->document;
        $clients->email = $request->email;
        $clients->phone = $request->phone;
        $clients->address = $request->address;
        $clients->save();

        return redirect()->route('Clients.Index');
    }

    public function edit ($id)
    {
        $type_documents = TypeDocument::all();
        $client = Client::findOrFail($id);
        return view('Dashboard.Clients.Edit', compact('type_documents' , 'client'));
    }

    public function update (ClientupdateRequest $request, $id)
    {
        $clients = Client::findOrFail($id);
        $clients->name = $request->name;
        $clients->type_document_id = $request->type_document_id;
        $clients->document = $request->document;
        $clients->email = $request->email;
        $clients->phone = $request->phone;
        $clients->address = $request->address;
        $clients->save();

        return redirect()->route('Clients.Index');
    }

}


