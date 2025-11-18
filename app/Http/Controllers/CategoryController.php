<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Dashboard.Categories.Index', compact('categories'));
    }

    public function create()
    {
        return view('Dashboard.Categories.Create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->save();

        return redirect()->route('Categories.Index');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('Dashboard.Categories.Edit', compact('categories'));
    }


    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('Categories.Index');
    }
}
