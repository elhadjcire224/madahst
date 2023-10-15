<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();

        return view('categorie.index', compact('categories'));
    }

    public function create(Request $request): View
    {
        return view('categorie.create');
    }

    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $categorie = Categorie::create($request->validated());

        return redirect()->route('categorie.index');
    }

    public function destroy(Request $request, Category $category): RedirectResponse
    {
        $categorie->delete();

        return redirect()->route('categorie.index');
    }

    public function update(CategoryUpdateRequest $request, Category $category): RedirectResponse
    {
        $categorie->update($request->validated());

        return redirect()->route('categorie.index');
    }
}
