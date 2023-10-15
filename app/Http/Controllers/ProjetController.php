<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetStoreRequest;
use App\Http\Requests\ProjetUpdateRequest;
use App\Models\Projet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjetController extends Controller
{
    public function index(Request $request): View
    {
        $projets = Projet::all();

        return view('projet.index', compact('projets'));
    }

    public function create(Request $request): View
    {
        return view('projet.create');
    }

    public function store(ProjetStoreRequest $request): RedirectResponse
    {
        $projet = Projet::create($request->validated());

        return redirect()->route('projet.index');
    }

    public function destroy(Request $request, Projet $projet): RedirectResponse
    {
        $projet->delete();

        return redirect()->route('projet.index');
    }

    public function update(ProjetUpdateRequest $request, Projet $projet): RedirectResponse
    {
        $projet->update($request->validated());

        return redirect()->route('projet.index');
    }
}
