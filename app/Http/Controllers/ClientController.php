<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('type_document')->get();
        return view('Dashboard.client.Index', compact('client'));
    }
}
