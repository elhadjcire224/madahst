<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleStoreRequest;
use App\Http\Requests\ModuleUpdateRequest;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    public function index(Request $request): View
    {
        $modules = Module::all();

        return view('module.index', compact('modules'));
    }

    public function create(Request $request): View
    {
        return view('module.create');
    }

    public function store(ModuleStoreRequest $request): RedirectResponse
    {
        $module = Module::create($request->validated());

        return redirect()->route('module.index');
    }

    public function destroy(Request $request, Module $module): RedirectResponse
    {
        $module->delete();

        return redirect()->route('module.index');
    }

    public function update(ModuleUpdateRequest $request, Module $module): RedirectResponse
    {
        $module->update($request->validated());

        return redirect()->route('module.index');
    }
}
