<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\TypeDocument;
use App\Models\User;
use App\Traits\ApiMessage;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    use ApiMessage;
    use ApiResponser;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Dashboard.home');
    }
}
