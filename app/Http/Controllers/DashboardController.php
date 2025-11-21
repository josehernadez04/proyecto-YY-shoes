<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::withCount('products')->get();

        $stockProducts = Product::select('name', 'stock')->get();

        return view('Dashboard.home', [
            'category' => $category,
            'stockProducts' => $stockProducts
        ]);
    }
}
