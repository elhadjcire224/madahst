<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitStoreRequest;
use App\Http\Requests\ProduitUpdateRequest;
use App\Models\Produit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProduitController extends Controller
{
    public function index(Request $request): View
    {
        $produits = Produit::all();

        return view('produit.index', compact('produits'));
    }

    public function create(Request $request): View
    {
        return view('produit.create');
    }

    public function store(ProduitStoreRequest $request): RedirectResponse
    {
        $produit = Produit::create($request->validated());

        return redirect()->route('produit.index');
    }

    public function destroy(Request $request, Produit $produit): RedirectResponse
    {
        $produit->delete();

        return redirect()->route('produit.index');
    }

    public function update(ProduitUpdateRequest $request, Produit $produit): RedirectResponse
    {
        $produit->update($request->validated());

        return redirect()->route('produit.index');
    }
}
