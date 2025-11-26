<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

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
        Category::create($request->validated());

        return redirect()
            ->route('Categories.Index')
            ->with('success', 'Categoría creada exitosamente');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Dashboard.Categories.Edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return redirect()
            ->route('Categories.Index')
            ->with('success', 'Categoría actualizada correctamente');
    }
}
