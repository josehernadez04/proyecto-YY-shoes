<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::with('type_document')->get();
        return view('Dashboard.Providers.Index', compact('providers'));
    }
}
