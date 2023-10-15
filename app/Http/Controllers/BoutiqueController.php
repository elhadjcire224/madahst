<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoutiqueStoreRequest;
use App\Http\Requests\BoutiqueUpdateRequest;
use App\Models\Boutique;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BoutiqueController extends Controller
{
    public function index(Request $request): View
    {
        $boutiques = Boutique::all();

        return view('boutique.index', compact('boutiques'));
    }

    public function create(Request $request): View
    {
        return view('boutique.create');
    }

    public function store(BoutiqueStoreRequest $request): RedirectResponse
    {
        $boutique = Boutique::create($request->validated());

        return redirect()->route('boutique.index');
    }

    public function destroy(Request $request, Boutique $boutique): RedirectResponse
    {
        $boutique->delete();

        return redirect()->route('boutique.index');
    }

    public function update(BoutiqueUpdateRequest $request, Boutique $boutique): RedirectResponse
    {
        $boutique->update($request->validated());

        return redirect()->route('boutique.index');
    }
}
