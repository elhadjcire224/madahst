<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockStoreRequest;
use App\Http\Requests\StockUpdateRequest;
use App\Models\Stock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockController extends Controller
{
    public function index(Request $request): View
    {
        $stocks = Stock::all();

        return view('stock.index', compact('stocks'));
    }

    public function create(Request $request): View
    {
        return view('stock.create');
    }

    public function store(StockStoreRequest $request): RedirectResponse
    {
        $stock = Stock::create($request->validated());

        return redirect()->route('stock.index');
    }

    public function destroy(Request $request, Stock $stock): RedirectResponse
    {
        $stock->delete();

        return redirect()->route('stock.index');
    }

    public function update(StockUpdateRequest $request, Stock $stock): RedirectResponse
    {
        $stock->update($request->validated());

        return redirect()->route('stock.index');
    }
}
